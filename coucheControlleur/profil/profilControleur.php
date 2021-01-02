<?php
session_start();
$_SESSION["id"] = 1;
require_once("../../view/profil/profilUtilisateur.php");
require_once("../../classe_metier/Image.php");
require_once("../../coucheService/ImageService.php");
require_once("../../classe_metier/Utilisateur.php");
require_once("../../coucheService/UtilisateurService.php");


$image = new Image();
$imageService = new ImageService();
$utilisateur = new Utilisateur();
$utilisateurService = new UtilisateurService();

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
            echo "il y a eu une erreur durant le téléchargement de l'image";
            die;
        }
    } else {
        echo "Type d'image non autorisé";
        die;
    }

    try {  //Supprime l'ancienne image profil dans dossier imageProfil
        $arrayImage = $imageService->readService();
        foreach ($arrayImage as $value) {
            $nomFichier = explode(".", $value->getNomFichier());
            if ($nomFichier[0] === "profil_Id" . $_SESSION["id"]) {
                $imageProfil = $value;
                unlink($value->getPathFile());
                break;
            } else {
                $imageProfil = null;
            }
        }

        $image->setId($value->getId())->setNomFichier($fileNewName)->setTailleFichier($_FILES["file"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
        if (!empty($imageProfil)) {
            $imageService->updateService($image);
        } else {
            $imageService->creatService($image);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"], $fileDestination);  // Déplace le nouveaux fichier dans dossier imageProfil
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Modification banniere profil
if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] === "modifBanniereProfil") {
    define("extension", array("png", "jpg", "gif", "jpeg"));  // Définition des types d'extension autorisée
    $fileExplode = explode(".", $_FILES["file"]["name"]);  // Récupère le type d'extension du fichier
    $fileExtension = strtolower($fileExplode[1]); // Passe le type d'extension en minuscule
    if (in_array($fileExtension, extension)) {  // Cherche si l'extension du fichier correspond au tableau des extension autorisé
        if ($_FILES["file"]["error"] === 0) {
            $fileNewName = "banniere_profil_Id" . $_SESSION["id"] . "." . $fileExtension;  // Change le nom du fichier
            $fileDestination = "../../view/profil/banniereProfil/" . $fileNewName;  // Change le nom de la destination du fichier
        } else {
            echo "il y a eu une erreur durant le téléchargement de l'image";
            die;
        }
    } else {
        echo "Type d'image non autorisé";
        die;
    }

    try {  //Supprime l'ancienne banniere dans dossier banniereProfil
        $arrayImage = $imageService->readService();
        foreach ($arrayImage as $value) {
            $nomFichier = explode(".", $value->getNomFichier());
            if ($nomFichier[0] === "banniere_profil_Id" . $_SESSION["id"]) {
                $imageProfil = $value;
                unlink($value->getPathFile());
                break;
            } else {
                $imageProfil = null;
            }
        }

        $image->setId($value->getId())->setNomFichier($fileNewName)->setTailleFichier($_FILES["file"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
        if (!empty($imageProfil)) {
            $imageService->updateService($image);
        } else {
            $imageService->creatService($image);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"], $fileDestination);  // Déplace le nouveaux fichier dans dossier banniereProfil
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


// Recherche données et image de l'utilisateur
try {
    // Recherche image profil de l'utilisateur
    $arrayImage = $imageService->readService();
    if (!empty($arrayImage)) {
        foreach ($arrayImage as $value) {
            $nomFichier = strstr($value->getNomFichier(), '.', true);
            if ($nomFichier === "profil_Id" . $_SESSION["id"]) {
                $nomFichier = $value->getNomFichier();
                $imageProfil = $imageService->searchImageProfilService($nomFichier);
            } elseif ($nomFichier === "banniere_profil_Id" . $_SESSION["id"]) {
                $nomFichier = $value->getNomFichier();
                $banniereProfil = $imageService->searchImageProfilService($nomFichier);
            } else {
                $imageProfil = null;
                $banniereProfil = null;
            }
        }
    } else {
        $imageProfil = null;
    }
    // Recherche données utilisateur
    $dataUtilisateur = $utilisateurService->trouveUtil($_SESSION["id"]);
    html($imageProfil, $dataUtilisateur, $banniereProfil);
} catch (PDOException $e) {
    echo $e->getMessage();
}
