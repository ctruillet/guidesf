<div id="search-div">
    <form id="search-form" data-bs-toggle="tooltip" title="Séparez les mots clés par le signe +">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" name="search" id="search"
                    <?php
                    if (!is_null($this->keyword)) {
                        echo ' value="'.strip_tags($this->keyword).'" ';
                    }
                    ?>
                    placeholder="Rechercher...">

                    <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
                    <a href="/?search=reset" id="reset-search-btn" class="btn btn-secondary btn-sm">Réinitialiser</a>
            </div>
    </form>

    <?php if (!is_null($this->keyword)): ?>
        <?php if (!is_null($this->keyword) && 0 == count($this->search_results)): ?>
        <p class="lead mt-2 mb-0">Pas de résultats pour "<strong><?php echo strip_tags($this->keyword); ?></strong>"</p>
        <?php elseif (!is_null($this->keyword) && 0 != count($this->search_results)): ?>

        <p class="lead mb-1 mt-2"><?php echo count($this->search_results); ?> résultats pour "<strong><?php echo strip_tags($this->keyword); ?></strong>"</p>

        <ul id="results">
            <?php foreach ($this->search_results as $filePath => $size) : ?>
                <?php
                // Number of occurrence
                $occurrence =  '1 occurrence';

                if ($size > 1) {
                    $occurrence = $size.' occurrences';
                }
                ?>
                <li><a href="?view=<?php echo urlencode($this->sections[$filePath]); ?>#<?php echo $this->anchorEncode($this->sections[$filePath]); ?>"><?php echo $this->sections[$filePath]; ?></a> <span class="badge bg-light text-dark" title="<?php echo $occurrence; ?>"><?php echo $occurrence; ?></span></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    <?php endif; ?>
</div>
