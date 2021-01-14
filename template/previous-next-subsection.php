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

            if ($this->is_home) {
                $nextSubsection = $subsectionsTitle;
            $nextSubsectionUrl = urlencode($subsectionsTitle).'#'.$this->anchorEncode($subsectionsTitle);
            break 2;
            }
        }

        if (!$lastLoop) {
            $previousSubsection = $subsectionsTitle;
            $previousSubsectionUrl = urlencode($subsectionsTitle).'#'.$this->anchorEncode($subsectionsTitle);
        }
    }
}
?>

<p class="clearfix previous-next-subsection">
<?php if ($previousSubsection): ?>
    <a class="float-left" href="?view=<?php echo $previousSubsectionUrl; ?>" role="button">< <?php echo $previousSubsection; ?></a>
<?php endif; ?>
<?php if ($nextSubsection): ?>
    <a class="float-right" href="?view=<?php echo $nextSubsectionUrl; ?>" role="button"><?php echo $nextSubsection; ?> ></a>
<?php endif; ?>
</p>
