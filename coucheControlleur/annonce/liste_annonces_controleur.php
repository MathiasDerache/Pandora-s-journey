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
require_once("../../classe_metier/Image.php");
require_once("../../coucheService/ImageService.php");


$annonce  =  new Annonce();
$image = new Image();
$imageService = new ImageService();

$annonceParPage = 9;

if (!empty($_GET)) {
    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "ajout_annonce") {
        $annonce = (new Annonce())->setTypeAnn($_POST['themeAnnonce'])->setTitreAnn($_POST['titreAnnonce'])->setDescAnn($_POST['descriptionAnnonce'])
            ->setNumContAnn($_POST['numeroContactAnnonce'])->setNumAdressAnn($_POST['numeroAdresseAnnonce'])->setRueAnn($_POST['rueAdresseAnnonce'])
            ->setCodePost($_POST['codePostalAnnonce'])->setIdUti($_SESSION['id']);
        $titreAnnonce = (new annoncesService())->readByTitreService($annonce->getTitreAnn());
        if (empty($titreAnnonce)) {
            (new AnnoncesService())->creatService($annonce);
            if (isset($_FILES["imageAnnonce"]) && !empty($_FILES["imageAnnonce"]["size"])) {
                $newAnnonce = (new annoncesService())->readByTitreService($annonce->getTitreAnn());

                // DEBUT AJOUT IMAGE ANNONCE
                define("extension", array("png", "jpg", "gif", "jpeg"));  // Définition des types d'extension autorisée
                $fileExplode = explode(".", $_FILES["imageAnnonce"]["name"]);  // Récupère le type d'extension du fichier
                $fileExtension = strtolower($fileExplode[1]); // Passe le type d'extension en minuscule
                if (in_array($fileExtension, extension)) {  // Cherche si l'extension du fichier correspond au tableau des extension autorisé
                    if ($_FILES["imageAnnonce"]["error"] === 0) {
                        $fileNewName = "annonce_Id" . $newAnnonce->getIdAnn() . "." . $fileExtension;  // Change le nom du fichier
                        $fileDestination = "../../view/profil/imageAnnonce/" . $fileNewName;  // Change le nom de la destination du fichier
                    } else {
                        header("Location: liste_annonces_controleur.php?type=" . $_GET["type"] . "&action=erreur_image_annonce_add");
                        die;
                    }
                } else {
                    header("Location: liste_annonces_controleur.php?type=" . $_GET["type"] . "&action=erreur_image_annonce_add");
                    die;
                }

                try {  //Supprime l'ancienne image profil dans dossier imageAnnonce
                    $arrayImage = $imageService->readService();
                    foreach ($arrayImage as $value) {
                        $nomFichier = explode(".", $value->getNomFichier());
                        if ($nomFichier[0] === "annonce_Id" . $newAnnonce->getIdAnn()) {
                            $imageAnnonce = $value;
                            break;
                        } else {
                            $imageAnnonce = null;
                        }
                    }

                    if (!empty($imageAnnonce)) {
                        $image->setId($value->getId())->setNomFichier($fileNewName)->setTailleFichier($_FILES["imageAnnonce"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                        $imageService->updateService($image);
                        unlink($value->getPathFile());
                    } else {
                        $image->setNomFichier($fileNewName)->setTailleFichier($_FILES["imageAnnonce"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                        $imageService->creatService($image);
                    }
                    move_uploaded_file($_FILES["imageAnnonce"]["tmp_name"], $fileDestination);  // Déplace le nouveaux fichier dans dossier imageAnnonce
                } catch (ServiceException $e) {
                    $erreur = $e->getCode();
                }
                // FIN AJOUT IMAGE ANNONCE
            }
        } else {
            header("Location: liste_annonces_controleur.php?type=" . $_GET["type"] . "&action=erreur_titre_annonce_add");
        }
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
        $titreAnnonce = (new annoncesService())->readByTitreService($annonce->getTitreAnn());
        if (empty($titreAnnonce) || $titreAnnonce->getIdAnn() == $annonce->getIdAnn()) {
            (new AnnoncesService())->updateService($annonce);

            if (isset($_FILES["imageAnnonce"]) && !empty($_FILES["imageAnnonce"])) {
                // DEBUT MODIF IMAGE ANNONCE
                define("extension", array("png", "jpg", "gif", "jpeg"));  // Définition des types d'extension autorisée
                $fileExplode = explode(".", $_FILES["imageAnnonce"]["name"]);  // Récupère le type d'extension du fichier
                $fileExtension = strtolower($fileExplode[1]); // Passe le type d'extension en minuscule
                if (in_array($fileExtension, extension)) {  // Cherche si l'extension du fichier correspond au tableau des extension autorisé
                    if ($_FILES["imageAnnonce"]["error"] === 0) {
                        $fileNewName = "annonce_Id" . $newAnnonce->getIdAnn() . "." . $fileExtension;  // Change le nom du fichier
                        $fileDestination = "../../view/profil/imageAnnonce/" . $fileNewName;  // Change le nom de la destination du fichier
                    } else {
                        header("Location: liste_annonces_controleur.php?type=" . $_GET["type"] . "&action=erreur_image_annonce_update");
                        die;
                    }
                } else {
                    header("Location: liste_annonces_controleur.php?type=" . $_GET["type"] . "&action=erreur_image_annonce_updat");
                    die;
                }

                try {  //Supprime l'ancienne image profil dans dossier imageAnnonce
                    $arrayImage = $imageService->readService();
                    foreach ($arrayImage as $value) {
                        $nomFichier = explode(".", $value->getNomFichier());
                        if ($nomFichier[0] === "annonce_Id" . $newAnnonce->getIdAnn()) {
                            $imageAnnonce = $value;
                            break;
                        } else {
                            $imageAnnonce = null;
                        }
                    }

                    if (!empty($imageAnnonce)) {
                        $image->setId($value->getId())->setNomFichier($fileNewName)->setTailleFichier($_FILES["imageAnnonce"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                        $imageService->updateService($image);
                        unlink($value->getPathFile());
                    } else {
                        $image->setNomFichier($fileNewName)->setTailleFichier($_FILES["imageAnnonce"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                        $imageService->creatService($image);
                    }
                    move_uploaded_file($_FILES["imageAnnonce"]["tmp_name"], $fileDestination);  // Déplace le nouveaux fichier dans dossier imageAnnonce
                } catch (ServiceException $e) {
                    $erreur = $e->getCode();
                }
                // FIN MODIF IMAGE ANNONCE
            }
        } else {
            header("Location: liste_annonces_controleur.php?type=" . $annonce->getTypeAnn() . "&action=erreur_titre_annonce_update");
        }

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
    } else if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "erreur_titre_annonce_add") {
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


        $erreur_add = "Le titre de l'annonce est déjà utilisé.";
        modalAjoutAnnonce($typeAnnonce);
        modalModificationAnnonce($typeAnnonce, $annonces);

        footer();
    } else if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "erreur_titre_annonce_update") {
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
    } else if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "erreur_image_annonce_add") {
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


        $erreur_add = "Le titre de l'annonce est déjà utilisé.";
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
