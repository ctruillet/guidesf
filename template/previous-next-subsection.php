<p class="clearfix previous-next-subsection">
<?php if ($previousSubsection): ?>
    <a class="btn btn-light btn-sm float-left" href="?view=<?php echo $previousSubsectionUrl; ?>" role="button">Section précédente : <?php echo $previousSubsection; ?></a>
<?php endif; ?>
<?php if ($nextSubsection): ?>
    <a class="btn btn-light btn-sm float-right" href="?view=<?php echo $nextSubsectionUrl; ?>" role="button">Section suivante : <?php echo $nextSubsection; ?></a>
<?php endif; ?>
</p>
