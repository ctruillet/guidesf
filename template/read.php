<?php
// Generate pagination: get previous and next subsection
$lastLoop = false;
$previousSubsection = null;
$nextSubsection = null;
$previousSubsectionUrl = null;
$nextSubsectionUrl = null;

foreach ($this->tree as $sectionTitle => $subsections) {
    foreach ($subsections as $subsectionsTitle => $value) {
        if ($lastLoop) {
            $nextSubsection = $subsectionsTitle;
            $nextSubsectionUrl = urlencode($subsectionsTitle).'#'.$this->anchorEncode($subsectionsTitle);
            break 2;
        }

        if ($subsectionsTitle == $this->subsection_title) {
            $lastLoop = true;
        }

        if (!$lastLoop) {
            $previousSubsection = $subsectionsTitle;
            $previousSubsectionUrl = urlencode($subsectionsTitle).'#'.$this->anchorEncode($subsectionsTitle);
        }
    }
}
?>

<div id="content">
    <?php include 'previous-next-subsection.php'; ?>

    <?php
    if (!is_null($this->content)) {
        echo $this->content;
    }
    ?>

    <br>
    <?php include 'previous-next-subsection.php'; ?>
</div>
