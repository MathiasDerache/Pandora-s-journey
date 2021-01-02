<?php

require_once("../../pages_anonces/head_annonce.php");
require_once("../../pages_anonces/body_annonce.php");
require_once("../../pages_anonces/card_annonce.php");
require_once("../../pages_anonces/pagination_annonce.php");
require_once("../../coucheService/AnnoncesService.php");
require_once("../../Pandora_nav_footer/nav.php");
require_once("../../Pandora_nav_footer/footer.php");

if (!empty($_GET)){
    if (isset($_GET['action']) && $_GET['action'] == "annonces_immobilier"){
        $title = "Immobilier";
        headAnnonce($title);
    }
    elseif(isset($_GET['action']) && $_GET['action'] == "annonces_travail"){
        $title = "Travail";
        headAnnonce($title);
    }
    elseif(isset($_GET['action']) && $_GET['action'] == "annonces_loisir"){
        $title = "Loisir";
        headAnnonce($title);
    }
}

navBar();
bodyAnnonces();

if (!empty($_GET)){
    if (isset($_GET['action']) && $_GET['action'] == "annonces_immobilier"){
        $annonces = (new AnnoncesService())->readService();
        for ($i=0; $i<count($annonces); $i++){
            if ($annonces[$i]->getTypeAnn() == 'immobilier'){
                cardAnnonce($annonces, $i);
            }
        }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == "annonces_travail"){
        $annonces = (new AnnoncesService())->readService();
        for ($i=0; $i<count($annonces); $i++){
            if ($annonces[$i]->getTypeAnn() == 'travail'){
                cardAnnonce($annonces, $i);
            }
        }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == "annonces_loisir"){
        $annonces = (new AnnoncesService())->readService();
        for ($i=0; $i<count($annonces); $i++){
            if ($annonces[$i]->getTypeAnn() == 'loisir'){
                cardAnnonce($annonces, $i);
            }
        }
    }
}

paginationAnnonce();
footer();
