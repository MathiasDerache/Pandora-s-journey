<?php

session_start();
$_SESSION['id'] = 1;

require_once("../../view/pages_anonces/head_annonce.php");
require_once("../../view/pages_anonces/body_liste_annonce.php");
require_once("../../view/pages_anonces/card_annonce.php");
require_once("../../view/pages_anonces/pagination_annonce.php");
require_once("../../coucheService/AnnoncesService.php");
require_once("../../classe_metier/Annonce.php");
require_once("../../Pandora_nav_footer/nav.php");
require_once("../../Pandora_nav_footer/footer.php");

if (!empty($_GET)){
    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "ajout_annonce"){
            $annonce = (new Annonce())->setTypeAnn($_POST['themeAnnonce'])->setTitreAnn($_POST['titreAnnonce'])->setDescAnn($_POST['descriptionAnnonce'])
                        ->setNumContAnn($_POST['numeroContactAnnonce'])->setNumAdressAnn($_POST['numeroAdresseAnnonce'])->setRueAnn($_POST['rueAdresseAnnonce'])
                        ->setCodePost($_POST['codePostalAnnonce'])->setIdUti($_SESSION['id']);
            (new AnnoncesService())->creatService($annonce);

            if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier"){
                $title = "Immobilier";
                headAnnonce($title);
            }
            elseif(isset($_GET['type']) && $_GET['type'] == "annonces_travail"){
                $title = "Travail";
                headAnnonce($title);
            }
            elseif(isset($_GET['type']) && $_GET['type'] == "annonces_loisir"){
                $title = "Loisir";
                headAnnonce($title);
            }
            
            navBar();
            bodyListeAnnonces($annonce->getTypeAnn());

            if (!empty($_GET)){
                if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier"){
                    $typeAnnonce="immobilier";
                    $annonces = (new AnnoncesService())->readService();
                    for ($i=0; $i<count($annonces); $i++){
                        if ($annonces[$i]->getTypeAnn() == 'immobilier'){
                            cardAnnonce($annonces, $i);
                        }
                    }
                }
                elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail"){
                    $typeAnnonce="travail";
                    $annonces = (new AnnoncesService())->readService();
                    for ($i=0; $i<count($annonces); $i++){
                        if ($annonces[$i]->getTypeAnn() == 'travail'){
                            cardAnnonce($annonces, $i);
                        }
                    }
                }
                elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir"){
                    $typeAnnonce="loisir";
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
        }
        else {
            if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier"){
                $title = "Immobilier";
                $typeAnnonce="immobilier";
                headAnnonce($title);
            }
            elseif(isset($_GET['type']) && $_GET['type'] == "annonces_travail"){
                $title = "Travail";
                $typeAnnonce="travail";
                headAnnonce($title);
            }
            elseif(isset($_GET['type']) && $_GET['type'] == "annonces_loisir"){
                $title = "Loisir";
                $typeAnnonce="loisir";
                headAnnonce($title);
            }

            navBar();
            bodyListeAnnonces($typeAnnonce);
            
            if (!empty($_GET)){
                if (isset($_GET['type']) && $_GET['type'] == "annonces_immobilier"){
                    $typeAnnonce="immobilier";
                    $annonces = (new AnnoncesService())->readService();
                    for ($i=0; $i<count($annonces); $i++){
                        if ($annonces[$i]->getTypeAnn() == 'immobilier'){
                            cardAnnonce($annonces, $i);
                        }
                    }
                }
                elseif (isset($_GET['type']) && $_GET['type'] == "annonces_travail"){
                    $typeAnnonce="travail";
                    $annonces = (new AnnoncesService())->readService();
                    for ($i=0; $i<count($annonces); $i++){
                        if ($annonces[$i]->getTypeAnn() == 'travail'){
                            cardAnnonce($annonces, $i);
                        }
                    }
                }
                elseif (isset($_GET['type']) && $_GET['type'] == "annonces_loisir"){
                    $typeAnnonce="loisir";
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
            
        }
    }

