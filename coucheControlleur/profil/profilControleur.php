<?php
session_start();
if (empty($_SESSION)) {
    header("Location: ../accueil/accueilController.php");
}
require_once("../../view/profil/profilUtilisateur.php");
require_once("../../classe_metier/Image.php");
require_once("../../coucheService/ImageService.php");
require_once("../../classe_metier/Utilisateur.php");
require_once("../../coucheService/UtilisateurService.php");
require_once("../../coucheService/SujetForumService.php");
require_once("../../coucheService/CommentaireForumService.php");
require_once("../../coucheService/BilletService.php");


$image = new Image();
$imageService = new ImageService();
$utilisateur = new Utilisateur();
$utilisateurService = new UtilisateurService();
$sujet = new SujetForumService();
$erreur = null;
$commForumSujet = new CommentaireForumService();
$billetService = new BilletService();

// Compte à reboure
if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] === "countDown") {
    $arrayBillet = $billetService->readByIdUtiService($_SESSION["id"]);
    $date = new DateTime();
    $dateNow = $date->format("Y-m-d");
    if (!empty($arrayBillet)) {
        foreach ($arrayBillet as $billet) {
            if ($billet->getDateEmb()->format("Y-m-d") >= $dateNow) {
                $dateEmb = $billet->getDateEmb()->format("Y-m-d");
                break;
            }
        }
    } else {
        $dateEmb = null;
    }
    echo $dateEmb;
} else {
    // Modification information profil
    if (
        isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] === "modifInfoProfil"
        && isset($_POST["email"]) && !empty($_POST["email"])
        && isset($_POST["password"]) && !empty($_POST["password"])
        && isset($_POST["pseudo"]) && !empty($_POST["pseudo"])
        && isset($_POST["civilité"]) && !empty($_POST["civilité"])
        && isset($_POST["nom"]) && !empty($_POST["nom"])
        && isset($_POST["prénom"]) && !empty($_POST["prénom"])
        && isset($_POST["date"]) && !empty($_POST["date"])
        && isset($_POST["téléphone"]) && !empty($_POST["téléphone"])
    ) {
        $idUti = $_SESSION["id"];
        $email = htmlentities($_POST["email"]);
        $password = htmlentities($_POST["password"]);
        $pseudo = htmlentities($_POST["pseudo"]);
        $civilite = htmlentities($_POST["civilité"]);
        $nom = htmlentities($_POST["nom"]);
        $prenom = htmlentities($_POST["prénom"]);
        $date = htmlentities($_POST["date"]);
        $telephone = htmlentities($_POST["téléphone"]);

        $utilisateur->setIdUti($idUti)->setEmail($email)->setPassword($password)->setPseudo($pseudo)->setCivilite($civilite)->setNom($nom)->setPrenom($prenom)->setDateNaissance(new DateTime($date))->setNumTel($telephone);
        $utilisateurService->updateService($utilisateur);
    }


    // Modification image profil
    if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] === "modifImageProfil") {
        define("extension", array("png", "jpg", "gif", "jpeg"));  // Définition des types d'extension autorisée
        $fileExplode = explode(".", $_FILES["file"]["name"]);  // Récupère le type d'extension du fichier
        $fileExtension = strtolower($fileExplode[1]); // Passe le type d'extension en minuscule
        if (in_array($fileExtension, extension)) {  // Cherche si l'extension du fichier correspond au tableau des extension autorisé
            if ($_FILES["file"]["error"] === 0) {
                $fileNewName = "profil_Id" . $_SESSION["id"] . "." . $fileExtension;  // Change le nom du fichier
                $fileDestination = "../../view/profil/imageProfil/" . $fileNewName;  // Change le nom de la destination du fichier
            } else {
                header('Location: profilControleur.php?action=erreur_telechargement_profil_image');
                die;
            }
        } else {
            header('Location: profilControleur.php?action=erreur_type_image_profil');
            die;
        }

        try {  //Supprime l'ancienne image profil dans dossier imageProfil
            $arrayImage = $imageService->readService();
            foreach ($arrayImage as $value) {
                $nomFichier = explode(".", $value->getNomFichier());
                if ($nomFichier[0] === "profil_Id" . $_SESSION["id"]) {
                    $imageProfil = $value;
                    break;
                } else {
                    $imageProfil = null;
                }
            }

            if (!empty($imageProfil)) {
                $image->setId($value->getId())->setNomFichier($fileNewName)->setTailleFichier($_FILES["file"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                $imageService->updateService($image);
                unlink($value->getPathFile());
            } else {
                $image->setNomFichier($fileNewName)->setTailleFichier($_FILES["file"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                $imageService->creatService($image);
            }
            move_uploaded_file($_FILES["file"]["tmp_name"], $fileDestination);  // Déplace le nouveaux fichier dans dossier imageProfil
        } catch (ServiceException $e) {
            $erreur = $e->getCode();
        }
    }

    // Modification banniere profil
    if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] === "modifBanniereProfil") {
        define("extension", array("png", "jpg", "gif", "jpeg"));  // Définition des types d'extension autorisée
        $fileExplode = explode(".", $_FILES["file"]["name"]);  // Récupère le type d'extension du fichier
        $fileExtension = strtolower($fileExplode[1]); // Passe le type d'extension en minuscule
        if (in_array($fileExtension, extension)) {  // Cherche si l'extension du fichier correspond au tableau des extension autorisé
            if ($_FILES["file"]["error"] === 0) {
                $fileNewName = "banniere_Id" . $_SESSION["id"] . "." . $fileExtension;  // Change le nom du fichier
                $fileDestination = "../../view/profil/banniereProfil/" . $fileNewName;  // Change le nom de la destination du fichier
            } else {
                header('Location: profilControleur.php?action=erreur_telechargement_banniere_image');
                echo "il y a eu une erreur durant le téléchargement de l'image";
                die;
            }
        } else {
            header('Location: profilControleur.php?action=erreur_type_image_banniere');
            echo "Type d'image non autorisé";
            die;
        }

        try {  //Supprime l'ancienne banniere dans dossier banniereProfil
            $arrayImage = $imageService->readService();
            foreach ($arrayImage as $value) {
                $nomFichier = explode(".", $value->getNomFichier());
                if ($nomFichier[0] === "banniere_Id" . $_SESSION["id"]) {
                    $banniere = $value;
                    break;
                } else {
                    $banniere = null;
                }
            }

            if (!empty($banniere)) {
                $image->setId($value->getId())->setNomFichier($fileNewName)->setTailleFichier($_FILES["file"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                $imageService->updateService($image);
                unlink($value->getPathFile());
            } else {
                $image->setNomFichier($fileNewName)->setTailleFichier($_FILES["file"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
                $imageService->creatService($image);
            }
            move_uploaded_file($_FILES["file"]["tmp_name"], $fileDestination);  // Déplace le nouveaux fichier dans dossier banniereProfil
        } catch (ServiceException $e) {
            $erreur = $e->getCode();
        }
    }

    try {
        // Recherche image profil de l'utilisateur
        $arrayImage = $imageService->readService();
        if (!empty($arrayImage)) {
            foreach ($arrayImage as $value) {
                $nomFichierProfil = strstr($value->getNomFichier(), '.', true);
                if ($nomFichierProfil === "profil_Id" . $_SESSION["id"]) {
                    $nomFichierProfil = $value->getNomFichier();
                    $imageProfil = $imageService->searchImageProfilService($nomFichierProfil);
                    break;
                } else {
                    $imageProfil = null;
                }
            }
        } else {
            $imageProfil = null;
        }

        // Recherche banniere de l'utilisateur
        if (!empty($arrayImage)) {
            foreach ($arrayImage as $value) {
                $nomFichier = strstr($value->getNomFichier(), '.', true);
                if ($nomFichier === "banniere_Id" . $_SESSION["id"]) {
                    $nomFichierBanniere = $value->getNomFichier();
                    $banniereProfil = $imageService->searchImageProfilService($nomFichierBanniere);
                    break;
                } else {
                    $banniereProfil = null;
                }
            }
        } else {
            $banniereProfil = null;
        }

        // Recherche données utilisateur
        $dataUtilisateur = $utilisateurService->readByIdService($_SESSION["id"]);

        // Recherche Sujet
        $tab = $sujet->readService();
        $arraySujet = [];
        $arrayReponse = [];
        foreach ($tab[0] as $value) {
            if ($value->getIdUti() === $_SESSION["id"]) {
                $arraySujet[] = $value;
                $arrayReponse[] = $commForumSujet->foundComById($value->getIdSujetTh());
            }
        }
    } catch (ServiceException $e) {
        $erreur = $e->getCode();
    }
    html($imageProfil, $dataUtilisateur, $banniereProfil, $arraySujet, $erreur, $arrayReponse);
}
