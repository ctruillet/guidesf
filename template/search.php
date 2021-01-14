<div id="search-div">
    <form id="search-form">
            <div class="input-group">
                <input type="text" class="form-control mb-1" name="search" id="search"
                    <?php
                    if (!is_null($this->keyword)) {
                        echo ' value="'.strip_tags($this->keyword).'" ';
                    }
                    ?>
                    placeholder='Mots clés (séparer les mots clés par un "+")'>

                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary mb-1">Rechercher</button>
                    <a href="/?search=reset" id="reset-search-btn" class="btn btn-secondary mb-1">Réinitialiser</a>
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted"></small>
            </div>
    </form>

    <?php if (!is_null($this->keyword)): ?>
    <div class="card" id="results-card">
        <div class="card-body">
            <?php if (!is_null($this->keyword) && 0 == count($this->search_results)): ?>
            <p class="lead text-danger">
                Pas de résultats pour "<strong><?php echo strip_tags($this->keyword); ?></strong>"
            </p>
            <?php elseif (0 != count($this->search_results)): ?>

            <p class="lead mb-1"><?php echo count($this->search_results); ?> résultats pour "<strong><?php echo strip_tags($this->keyword); ?></strong>"</p>

            <ul id="results" >
                <?php foreach ($this->search_results as $filePath => $size) : ?>
                    <?php
                    // Number of occurrence
                    $occurrence =  '1 occurrence';

                    if ($size > 1) {
                        $occurrence = $size.' occurrences';
                    }
                    ?>
                    <li><a href="?view=<?php echo urlencode($this->sections[$filePath]); ?>#<?php echo $this->anchorEncode($this->sections[$filePath]); ?>"><?php echo $this->sections[$filePath]; ?></a> <span class="badge badge-light" title="<?php echo $occurrence; ?>"><?php echo $occurrence; ?></span></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
