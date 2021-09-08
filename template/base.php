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

    <link rel="stylesheet" href="css/style.min.css?v=df52acd2-735c-42a5-ba5e-0e79e6b7c92c">
    <meta name="theme-color" content="#002252">
    <link rel="icon" type="image/png" href="guidesf.png">
</head>

<body>
    <div class="container mt-3" id="content">
        <h1 class="mb-0">GuideSF <small class="text-muted">Guide Réglementaire du Scoutisme Français</small></h1>
        <p>Édition du 5 février 2020</p>

        <div class="bg-light pl-3 pr-3 pt-1 pb-1"><span class="badge bg-info">Nouveau !</span> Une calculatrice vous permet de calculer le taux d'encadrement d'un camp dans <a href="/?view=1.2.+Taux+d%27encadrement+et+qualifications#1.2.d.Tauxd%27encadrement">la section "1.2.d. Taux d'encadrement"</a>.</div>

        <?php
        if ($_SERVER['SERVER_NAME'] == 'guidesf.pweyl.com') {
        ?>
        <div class="alert alert-warning" role="alert">Vous utilisez l'ancienne URL ! Je vous invite à dorénavant utiliser la nouvelle : <a href="https://guidesf.pwbzh.fr">guidesf.pwbzh.fr</a></div>
        <?php
        }
        ?>

        <?php
        // Search form
        include_once 'search.php';
        include 'breadcrumb.php';
        include 'previous-next-subsection.php';
        ?>

        <div class="card mb-3">
            <div class="card-body">
            <?php if ($this->is_home) { include 'table-of-contents.php'; } else { include_once __DIR__.'/'.$template; } ?>
            </div>
        </div>

        <?php
        include 'previous-next-subsection.php';
        include 'breadcrumb.php';
        ?>

        <p id="source">Source : <a href="http://www.scoutisme-francais.fr/formation" target="_blank">Guide Réglementaire du Scoutisme Français - Édition du 5 février 2020</a></p>

        <hr>
            <div class="text-center">
                        <p class="text-muted mb-0">Ce site web n'est pas officiel. Il n'est pas édité par le Scoutisme Français.</p>
                        <p class="text-muted">Développé avec &hearts; par <a href="http://pwbzh.fr" target="_blank">Pierre Weyl</a>, bénévole chez les <a href="https://www.sgdf.fr/" target="_blank">Scouts et Guides de France</a>.</p>
                        

                        <p class="text-muted mb-0">Tu souhaites contribuer ? Cette application est un logiciel libre. Retrouvons-nous sur <a href="https://github.com/pwbzh/guidesf" target="_blank">GitHub</a> :-)</p>
                        <p class="text-muted">Contributeur : <a href="https://github.com/antoinevth" target="_blank">antoinevth</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
