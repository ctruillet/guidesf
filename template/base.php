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

    <link rel="stylesheet" href="css/style.min.css?v=134dd8be-aa96-499a-a7ed-cef338b00519">
    <meta name="theme-color" content="#003596">
    <link rel="icon" type="image/png" href="guidesf.png">
</head>

<body>
    <div id="website-title" class="bg-dark py-1 px-3 border-bottom"><a href="/" class="text-decoration-none" title="Accueil"><span class="text-white"><strong>GuideSF</strong></span> <span class="text-light"><small>Guide Réglementaire du Scoutisme Français</small></span></a></div>

    <?php include_once 'nav.php'; ?>

    <div class="bg-white border-bottom">
        <div class="container py-2">
            <?php include_once 'search.php'; ?>
        </div>
    </div>

    <div class="container my-3" id="content">
        <div class="border border-info px-2 py-1 mb-3"><span class="badge bg-info">Nouveau !</span> Une calculatrice vous permet de calculer le taux d'encadrement d'un camp dans <a href="/?view=1.2.+Taux+d%27encadrement+et+qualifications#1.2.d.Tauxd%27encadrement">la section "1.2.d. Taux d'encadrement"</a>.</div>

        <?php include_once 'breadcrumb.php'; ?>

        <?php include 'previous-next-subsection.php'; ?>

        <div class="card shadow mb-3 border-secondary">
            <div class="card-body p-4">
            <?php include_once __DIR__.'/'.$template; ?>
            </div>
        </div>

        <?php include 'previous-next-subsection.php'; ?>

        <?php include_once 'footer.php'; ?>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
</body>

</html>
