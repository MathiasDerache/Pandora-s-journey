<?php

require_once("../pages_anonces/immobilier.php");
require_once("../pages_anonces/loisirs.php");
require_once("../pages_anonces/travail.php");
require_once("../coucheService/AnnoncesService.php");
require_once("../Pandora_nav_footer/nav.php");
require_once("../Pandora_nav_footer/footer.php");

navBar();
body();

if (!empty($_GET)){
    if (isset($_GET['action']) && $_GET['action'] == "annonces_immobilier"){
        $annonces = (new AnnoncesService())->readService();
        for ($i=0; $i<count($annonces); $i++){
            if ($annonces[$i]->getTypeAnn() == 'immobilier'){
                card($annonces, $i);
            }
        }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == "annonces_travail"){
        $annonces = (new AnnoncesService())->readService();
        for ($i=0; $i<count($annonces); $i++){
            if ($annonces[$i]->getTypeAnn() == 'travail'){
                card($annonces, $i);
            }
        }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == "annonces_loisir"){
        $annonces = (new AnnoncesService())->readService();
        for ($i=0; $i<count($annonces); $i++){
            if ($annonces[$i]->getTypeAnn() == 'loisir'){
                card($annonces, $i);
            }
        }
    }
}

pagination();
footer();
