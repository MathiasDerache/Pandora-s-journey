<?php

session_start();

require_once("../../view/pages_anonces/head_annonce.php");
require_once("../../view/pages_anonces/body_liste_annonce.php");
require_once("../../view/pages_anonces/modal_annonce.php");
require_once("../../view/pages_anonces/card_annonce.php");
require_once("../../view/pages_anonces/pagination_annonce.php");
require_once("../../coucheService/AnnoncesService.php");
require_once("../../classe_metier/Annonce.php");
require_once("../../Pandora_nav_footer/nav.php");
require_once("../../Pandora_nav_footer/footer.php");


$annonce  =  new Annonce();

$annonceParPage = 9;

if (!empty($_GET)) {
    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "ajout_annonce") {
        $annonce = (new Annonce())->setTypeAnn($_POST['themeAnnonce'])->setTitreAnn($_POST['titreAnnonce'])->setDescAnn($_POST['descriptionAnnonce'])
            ->setNumContAnn($_POST['numeroContactAnnonce'])->setNumAdressAnn($_POST['numeroAdresseAnnonce'])->setRueAnn($_POST['rueAdresseAnnonce'])
            ->setCodePost($_POST['codePostalAnnonce'])->setIdUti($_SESSION['id']);
        (new AnnoncesService())->creatService($annonce);
        navBar();
        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $title = "Immobilier";
            $typeAnnonce = "immobilier";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $title = "Travail";
            $typeAnnonce = "travail";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $title = "Loisir";
            $typeAnnonce = "loisir";
            headAnnonce($title);
        }

        navBar();

        if (isset($_GET['page'])) {
            $pageActuelle = $_GET['page'];
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        } else {
            $pageActuelle = 1;
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        }

        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $typeAnnonce = "immobilier";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $typeAnnonce = "travail";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $typeAnnonce = "loisir";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        }
        paginationAnnonce($nbreDePage, $pageActuelle, $_GET['type']);

        modalAjoutAnnonce($typeAnnonce);
        modalModificationAnnonce($typeAnnonce, $annonces);

        footer();
    } elseif (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "delete") {
        (new AnnoncesService)->deleteService($_GET['id']);

        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $title = "Immobilier";
            $typeAnnonce = "immobilier";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $title = "Travail";
            $typeAnnonce = "travail";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $title = "Loisir";
            $typeAnnonce = "loisir";
            headAnnonce($title);
        }

        navBar();

        if (isset($_GET['page'])) {
            $pageActuelle = $_GET['page'];
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        } else {
            $pageActuelle = 1;
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        }

        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $typeAnnonce = "immobilier";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $typeAnnonce = "travail";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $typeAnnonce = "loisir";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        }
        paginationAnnonce($nbreDePage, $pageActuelle, $_GET['type']);

        modalAjoutAnnonce($typeAnnonce);
        modalModificationAnnonce($typeAnnonce, $annonces);

        footer();
    } elseif (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "update") {
        $annonce = (new Annonce())->setTypeAnn($_POST['themeAnnonce'])->setTitreAnn($_POST['titreAnnonce'])->setDescAnn($_POST['descriptionAnnonce'])
            ->setNumContAnn($_POST['numeroContactAnnonce'])->setNumAdressAnn($_POST['numeroAdresseAnnonce'])->setRueAnn($_POST['rueAdresseAnnonce'])
            ->setCodePost($_POST['codePostalAnnonce'])->setIdUti($_SESSION['id'])->setIdAnn($_GET['id']);
        (new AnnoncesService())->updateService($annonce);

        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $title = "Immobilier";
            $typeAnnonce = "immobilier";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $title = "Travail";
            $typeAnnonce = "travail";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $title = "Loisir";
            $typeAnnonce = "loisir";
            headAnnonce($title);
        }

        navBar();

        if (isset($_GET['page'])) {
            $pageActuelle = $_GET['page'];
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        } else {
            $pageActuelle = 1;
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        }

        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $typeAnnonce = "immobilier";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $typeAnnonce = "travail";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $typeAnnonce = "loisir";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        }
        paginationAnnonce($nbreDePage, $pageActuelle, $_GET['type']);

        modalAjoutAnnonce($typeAnnonce);
        modalModificationAnnonce($typeAnnonce, $annonces);

        footer();
    } else {
        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $title = "Immobilier";
            $typeAnnonce = "immobilier";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $title = "Travail";
            $typeAnnonce = "travail";
            headAnnonce($title);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $title = "Loisir";
            $typeAnnonce = "loisir";
            headAnnonce($title);
        }

        navBar();

        if (isset($_GET['page'])) {
            $pageActuelle = $_GET['page'];
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        } else {
            $pageActuelle = 1;
            $premiereEntree = ($pageActuelle - 1) * $annonceParPage;
            $total = (new AnnoncesService())->selectAllAsTotalService($typeAnnonce, $annonceParPage, $premiereEntree);
            $nbreDePage = ceil($total / $annonceParPage);
        }

        if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier") {
            $typeAnnonce = "immobilier";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail") {
            $typeAnnonce = "travail";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        } elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir") {
            $typeAnnonce = "loisir";
            $annonces = (new AnnoncesService())->readPaginationService($typeAnnonce, $premiereEntree, $annonceParPage);
            $annonceType = (new AnnoncesService)->readByTypeService($typeAnnonce);
            bodyListeAnnonces();
            cardAnnonce($typeAnnonce, $annonces);
        }
        paginationAnnonce($nbreDePage, $pageActuelle, $_GET['type']);



        modalAjoutAnnonce($typeAnnonce);
        modalModificationAnnonce($typeAnnonce, $annonces);

        footer();
    }
?><script src="app.js" type="text/javascript"></script>
    <script src="jquery-3.5.1.min.js" type="text/javascript"></script>
<?php }
