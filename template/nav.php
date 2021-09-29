<nav class="navbar navbar-expand-xl navbar-light bg-white">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <?php foreach ($this->tree as $chapter => $sections): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-wrap" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $chapter; ?></a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                            $sectionsNumber = count($sections);
                            $loopCounter = 0;
                            ?>
                            <?php foreach ($sections as $section => $subsections): ?>
                                <li><a class="dropdown-item text-wrap" href="?view=<?php echo urlencode($section); ?>#<?php echo $this->anchorEncode($section); ?>"><strong><?php echo $section; ?></strong></a></li>
                                <?php if (!is_null($subsections)): ?>
                                    <?php foreach ($subsections as $subsection): ?>
                                        <li><a class="dropdown-item text-wrap" href="?view=<?php echo urlencode($section); ?>#<?php echo $this->anchorEncode($subsection); ?>"><span class="text-muted">&bull;</span> <?php echo $subsection; ?></a></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php ++$loopCounter; ?>
                                <?php if ($loopCounter < $sectionsNumber): ?><li><hr class="dropdown-divider"></li><?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>