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
    <div class="modal fade" id="analyticsModal" tabindex="-1" aria-labelledby="analyticsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="analyticsModalLabel">Consentement </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bonjour,</p>
                    <p>
                        J'utilise un cookie (Google Analytics) pour connaître le nombre de visiteurs sur le site web GuideSF.<br>
                        Conformément au RGPD, je vous laisse le choix d'accepter ou non ce suivi. Votre choix est conservé 3 mois.<br>
                        Vous pouvez modifier votre choix à tout moment en cliquant sur le bouton en bas de la page.
                    </p>
                    <p class="mb-0">Merci,<br>Pierre</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success text-white" id="btn-analytics-ok" data-bs-dismiss="modal">Accepter</button>
                    <button type="button" class="btn btn-outline-danger" id="btn-analytics-nok" data-bs-dismiss="modal">Refuser</button>
                </div>
            </div>
        </div>
    </div>

    <div id="website-title" class="bg-dark py-1 px-3 border-bottom"><a href="/" class="text-decoration-none" title="Accueil"><span class="text-white"><strong>GuideSF</strong></span> <span class="text-light"><small>Guide Réglementaire du Scoutisme Français</small></span></a></div>

    <?php include_once 'nav.php'; ?>

    <div class="bg-white border-bottom">
        <div class="container py-2">
            <?php include_once 'search.php'; ?>
        </div>
    </div>

    <div class="container my-3" id="content">
        <div class="border border-info px-2 py-1 mb-3 rounded"><span class="badge bg-info">Nouveau !</span> Une calculatrice vous permet de calculer le taux d'encadrement d'un camp dans <a href="/?view=1.2.+Taux+d%27encadrement+et+qualifications#1.2.d.Tauxd%27encadrement">la section "1.2.d. Taux d'encadrement"</a>.</div>

        <?php include_once 'breadcrumb.php'; ?>

        <?php include 'previous-next-subsection.php'; ?>

        <div class="card shadow-sm mb-3 border-secondary">
            <div class="card-body p-4">
            <?php include_once __DIR__.'/'.$template; ?>
            </div>
        </div>

        <?php include 'previous-next-subsection.php'; ?>

        <?php include_once 'footer.php'; ?>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        // Tooltip
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });

        // Analytics
        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        var analyticsModal = new bootstrap.Modal(document.getElementById('analyticsModal'));
        var allow_analytics = getCookie("allow_analytics");

        if (allow_analytics == "no") {
            // Do nothing
        } else if (allow_analytics == "yes") {
            // Enable analytics
            var analyticsID = "<?php echo getenv('ANALYTICS_ID'); ?>";

            let myScript = document.createElement("script");
            myScript.setAttribute("src", "https://www.googletagmanager.com/gtag/js?id="+analyticsID);
            document.body.appendChild(myScript);

            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', analyticsID);
        } else {
            // Open modal
            analyticsModal.show();
        }

        document.getElementById('btn-analytics-ok').onclick = function() {
            // Allow analytics
            setCookie("allow_analytics", "yes", 92);
        };

        document.getElementById('btn-analytics-nok').onclick = function() {
            // Disallow analytics
            setCookie("allow_analytics", "no", 92);
        };

        document.getElementById('btn-analytics-open-modal').onclick = function() {
            // Open modal
            analyticsModal.show();
        };
    </script>
</body>

</html>
