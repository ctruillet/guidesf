<div id="table-of-contents">
    <?php foreach ($this->tree as $chapter => $sections): ?>
        <h3 class="sections"><?php echo $chapter; ?></h3>

        <ul>
            <?php foreach ($sections as $section => $subsections): ?>
                <li><a href="?view=<?php echo urlencode($section); ?>#<?php echo $this->anchorEncode($section); ?>"><?php echo $section; ?></a></li>
                    <?php if (!is_null($subsections)): ?>
                        <ul>
                            <?php foreach ($subsections as $subsection): ?>
                                <li>
                                    <a href="?view=<?php echo urlencode($section); ?>#<?php echo $this->anchorEncode($subsection); ?>"><?php echo $subsection; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>
