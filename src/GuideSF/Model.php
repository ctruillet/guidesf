<?php

namespace GuideSF;

// DOMDocument errors
libxml_use_internal_errors(true);

class Model
{
    use Helper;

    protected $tree = array();
    protected $path = array();
    protected $sections = array();
    protected $sectionTitle = null;

    protected function getTableOfContents(): void
    {
        // Get guide table of contents
        foreach (glob(__DIR__.'/../sections/*.html') as $filePath) {
            $chapter = null;
            $section = null;

            // Load ressource
            $html = file_get_contents($filePath);
            $doc = new \DOMDocument();
            $doc->loadHTML(utf8_decode($html));

            // Get chapter
            foreach ($doc->getElementsByTagName("h2") as $h2) {
                $chapter = $h2->textContent;

                if (!isset($this->tree[$chapter])) {
                    $this->tree[$chapter] = null;
                }

                // Only one chapter
                break;
            }

            // Get section
            foreach ($doc->getElementsByTagName("h3") as $h3) {
                $section = $h3->textContent;

                // Save filepath
                if (!isset($this->tree[$chapter][$section])) {
                    $this->tree[$chapter][$section] = null;
                    $this->path[$section] = $filePath;
                }

                // Section title by filepath
                $this->sections[$filePath] = $section;

                // Only one section
                break;
            }

            // Get subsections
            foreach ($doc->getElementsByTagName("h4") as $h4) {
                $this->tree[$chapter][$section][] = $h4->textContent;
            }
        }

        // Sort the table of contents
        foreach ($this->tree as $chapter => $chapterSections) {
            uksort(
                $chapterSections,
                function ($key1, $key2) {
                    $search = '.';
                    $replace = '';
                    $pattern = '#^([\.\d]+)\s.+$#';

                    $key1 = str_replace(
                        $search,
                        $replace,
                        preg_replace($pattern, '$1', $key1)
                    );

                    $key2 = str_replace(
                        $search,
                        $replace,
                        preg_replace($pattern, '$1', $key2)
                    );

                    return $key1 <=> $key2;
                }
            );

            $this->tree[$chapter] = $chapterSections;
        }
    }

    public function getTree(): array
    {
        if (empty($this->tree)) {
            $this->getTableOfContents();
        }

        return $this->tree;
    }

    public function getPath(): array
    {
        if (empty($this->path)) {
            $this->getTableOfContents();
        }

        return $this->path;
    }

    public function getSections(): array
    {
        if (empty($this->sections)) {
            $this->getTableOfContents();
        }

        return $this->sections;
    }

    public function getSectionTitle(): string
    {
        if (is_null($this->sectionTitle)) {
            throw new \Exception('Section title does not exist.');
        }

        return $this->sectionTitle;
    }

    public function getSection(string $view): string
    {
        if (empty($view)) {
            return '';
        }
        
        // Section view
        $content = null;

        // Generate table of contents
        $this->getTableOfContents();

        // Get guide section
        $html = file_get_contents($this->path[strip_tags(urldecode($view))]);
        $doc = new \DOMDocument();
        $doc->loadHTML(utf8_decode($html));

        // Remove doctype element
        $doc->doctype->parentNode->removeChild($doc->doctype);

        // Remove html element, preserving child nodes
        $html = $doc->getElementsByTagName("html")->item(0);
        $fragment = $doc->createDocumentFragment();

        while ($html->childNodes->length > 0) {
            $fragment->appendChild($html->childNodes->item(0));
        }

        $html->parentNode->replaceChild($fragment, $html);

        // Remove body element, preserving child nodes
        $body = $doc->getElementsByTagName("body")->item(0);
        $fragment = $doc->createDocumentFragment();

        while ($body->childNodes->length > 0) {
            $fragment->appendChild($body->childNodes->item(0));
        }

        $body->parentNode->replaceChild($fragment, $body);

        // Remove chapter title
        $h2 = $doc->getElementsByTagname('h2');

        foreach ($h2 as $element) {
            $this->sectionTitle = $element->textContent;
            $element->parentNode->removeChild($element);
        }

        // Add section links for table of contents
        $h3 = $doc->getElementsByTagname('h3');

        foreach ($h3 as $element) {
            //$element->setAttribute("id", anchorEncode($element->textContent));
            $element->parentNode->removeChild($element);
        }

        // Add subsection links for table of contents
        $h4 = $doc->getElementsByTagname('h4');

        foreach ($h4 as $element) {
            $element->setAttribute("id", $this->anchorEncode($element->textContent));
        }

        $content = $doc->saveHTML();

        return $content;
    }

    public function search(string $keyword = null): array
    {
        $grepOutput = null;
        $searchResults = array();
        $finalSearchResults = array();

        if (isset($keyword) && !empty($keyword) && $keyword != 'reset') {
            // Save the keyword in session
            $_SESSION['search'] = strip_tags($keyword);

            // Explode keywords
            $explodePlus = explode('+', $keyword);

            // Apply trim
            $explodePlus = array_map('trim', $explodePlus);

            // Remove sign "+"
            $keywords = array_filter($explodePlus, function ($value) {
                return $value !== '+';
            });

            // Search in files for each keyword
            foreach ($keywords as $keyword) {
                $grepOutput = null;

                // Grep the keyword in sections
                exec("grep -ri '".__dir__.'/../sections/'."' -e '".strip_tags($keyword)."'", $grepOutput);

                // Format search results
                if (!empty($grepOutput)) {
                    foreach ($grepOutput as $value) {
                        $key = explode('#', preg_replace("#^(.+).html:(.+)$#", "$1.html#$2", $value));

                        if (empty($key[1])) {
                            continue;
                        }

                        if (!array_key_exists($keyword, $searchResults)) {
                            $searchResults[$keyword] = array();
                        }

                        if (!array_key_exists($key[0], $searchResults[$keyword])) {
                            $searchResults[$keyword][$key[0]] = 0;
                        }

                        // Increment occurrence found
                        if (array_key_exists($key[0], $searchResults[$keyword])) {
                            ++$searchResults[$keyword][$key[0]];
                        }
                    }

                    // Sort from strongest to weakest
                    if (!empty($searchResults[$keyword])) {
                        arsort($searchResults[$keyword]);
                    }
                }
            }

            // Find files common to all keywords
            $commonResults = array();

            if (!empty($searchResults)) {
                foreach ($searchResults as $keyword => $results) {
                    foreach ($results as $key => $value) {
                        if (!array_key_exists($key, $commonResults)) {
                            $commonResults[$key] = 0;
                        }

                        ++$commonResults[$key];
                    }
                }

                foreach ($commonResults as $key => $value) {
                    if ($value < count($keywords)) {
                        unset($commonResults[$key]);
                    }
                }
            }

            if (empty($commonResults)) {
                $searchResults = array();
            }

            // Format to a single array
            if (!empty($commonResults)) {
                foreach ($searchResults as $keyword => $results) {
                    foreach ($results as $key => $value) {
                        if (array_key_exists($key, $commonResults)) {
                            if (!array_key_exists($key, $finalSearchResults)) {
                                $finalSearchResults[$key] = $value;
                                continue;
                            }

                            $finalSearchResults[$key] = $finalSearchResults[$key] + $value;
                        }
                    }
                }
            }
        }

        return $finalSearchResults;
    }
}
