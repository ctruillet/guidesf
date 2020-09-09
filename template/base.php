<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Version en ligne du Guide Réglementaire du Scoutisme Français">
    <meta name="keywords" content="scouts,guides,sgdf,fédération,scoutisme,français,guide,réglementaire,taux,encadrement,omms,amge,camp">
    <meta name="author" content="Pierre Weyl">

    <title>
        <?php
        if (!$this->is_home && isset($this->subsection_title)) {
            echo $this->subsection_title.' - ';

            if ($this->subsection_title != $this->section_title) {
                echo $this->section_title.' - ';
            }
        }
        ?>
        GuideSF
    </title>

    <link rel="stylesheet" href="css/style.min.css?v=20200909">
    <meta name="theme-color" content="#01579b">
    <link rel="icon" type="image/png" href="guidesf.png">
</head>

<body>
    <div id="top" class="shadow-sm">
        <div class="container" id="content">
            <h1>GuideSF <small class="text-muted">Guide Réglementaire du Scoutisme Français</small></h1>
            <p>Édition du 5 février 2020</p>
        </div>
    </div>

    <div class="container" id="content">
        <?php
        if ($_SERVER['SERVER_NAME'] == 'guidesf.pweyl.com') {
        ?>
        <div class="alert alert-warning" role="alert">Vous utilisez l'ancienne URL ! Je vous invite à dorénavant utiliser la nouvelle : <a class="text-white" href="https://guidesf.pwbzh.fr">guidesf.pwbzh.fr</a></div>
        <?php
        }
        ?>

        <?php
        // Search form
        include_once 'search.php';
        include 'breadcrumb.php';
        ?>

        <?php if ($this->is_home) { include 'table-of-contents.php'; } else { include_once __DIR__.'/'.$template; } ?>

        <?php
        include 'breadcrumb.php';
        ?>

        <p id="source">Source : <a title="http://www.scoutisme-francais.fr/formation" href="http://www.scoutisme-francais.fr/formation">Guide Réglementaire du Scoutisme Français - Édition du 5 février 2020</a></p>

        <p class="text-muted text-center mt-4 mb-0">Développé avec &hearts; par <a href="http://pwbzh.fr">Pierre Weyl</a>, bénévole chez les <a href="https://www.sgdf.fr/">Scouts et Guides de France</a>.</p>
        <p class="text-muted text-center mb-2">Ce site web n'est pas officiel. Il n'est pas édité par le Scoutisme Français.</p>
        <p class="text-muted text-center mb-0">Tu souhaites contribuer ? Retrouvons-nous sur <a href="https://github.com/pwbzh/guidesf">GitHub</a> :-)</p>
        <p class="text-muted text-center">Tu aimes ce site ? Tu aimeras sûrement <a href="https://tauxsf.pwbzh.fr">TauxSF</a> !</p>
    </div>
</body>

</html>
