<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php
        if (isset($this->subsection_title)) {
            echo $this->subsection_title.' - ';

            if ($this->subsection_title != $this->section_title) {
                echo $this->section_title.' - ';
            }
        }
        ?>
        Guide Réglementaire du Scoutisme Français
    </title>

    <link rel="stylesheet" href="css/style.min.css">
    <meta name="theme-color" content="#003a5d">
</head>

<body>
    <div id="top">
        <div class="container">
            <h1>GuideSF <small class="text-muted">Guide Réglementaire du Scoutisme Français</small></h1>
            <p>Édition du 3 avril 2018</p>
        </div>
    </div>

    <div class="container" id="content">
        <?php
        // Search form
        include_once 'search.php';
        ?>

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

        <?php if ($this->is_home) { include 'table-of-contents.php'; } else { include_once __DIR__.'/'.$template; } ?>

        <p id="source">Source : <a title="http://www.scoutisme-francais.fr/formation" href="http://www.scoutisme-francais.fr/formation">Guide Réglementaire du Scoutisme Français - Édition du 3 avril 2018</a></p>

        <p class="text-muted text-center mt-4 mb-0">Développé avec &hearts; par <a href="http://pwbzh.fr">Pierre Weyl</a>, bénévole chez les <a href="https://www.sgdf.fr/">Scouts et Guides de France</a>.</p>
        <p class="text-muted text-center">Ce site web n'est pas officiel. Il n'est pas édité par le Scoutisme Français.</p>
    </div>
</body>

</html>
