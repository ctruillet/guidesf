<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/">Sommaire</a></li>
    <?php if (!$this->is_home && isset($this->subsection_title)): ?>
    <li class="breadcrumb-item active">
        <?php echo strip_tags(urldecode($this->section_title)); ?>
    </li>
        <?php if ($this->subsection_title != $this->section_title): ?>
        <li class="breadcrumb-item active">
            <?php echo strip_tags(urldecode($this->subsection_title)); ?>
        </li>
        <?php endif; ?>
    <?php endif; ?>
</ol>