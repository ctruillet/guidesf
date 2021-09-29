<h3 class="mb-3">
    <?php if (isset($this->subsection_title)): ?>
        <?php echo strip_tags(urldecode($this->section_title)); ?>

        <?php if ($this->subsection_title != $this->section_title): ?>
            <br><span class="text-muted"><small><?php echo strip_tags(urldecode($this->subsection_title)); ?></span></small>
        <?php endif; ?>
    <?php endif; ?>
</h3>