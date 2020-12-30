<?php
session_start();
$_SESSION["id"] = 2;
require_once("../../view/profil/profilUtilisateur.php");
require_once("../../classe_metier/Image.php");
require_once("../../coucheService/ImageService.php");

$image = new Image();
$imageService = new ImageService();

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

    try {  //Supprime l'ancienne image profil
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

        if (!empty($imageProfil)) {
            $idImage = $imageProfil->getId();
            $imageService->deleteService($idImage);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    try {  // Ajoute nouvelle image profil
        $image->setNomFichier($fileNewName)->setTailleFichier($_FILES["file"]["size"])->setPathFile($fileDestination)->setTypeImage($fileExtension)->setIdUti($_SESSION["id"]);
        $imageService->creatService($image);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    move_uploaded_file($_FILES["file"]["tmp_name"], $fileDestination);  // Déplace le fichier dans la nouvelle destination
}
try {  // Recherche image profil de l'utilisateur
    $arrayImage = $imageService->readService();
    foreach ($arrayImage as $value) {
        $nomFichier = strstr($value->getNomFichier(), '.', true);
        if ($nomFichier === "profil_Id" . $_SESSION["id"]) {
            $nomFichier = $value->getNomFichier();
            $imageProfil = $imageService->searchImageProfilService($nomFichier);
        } else {
            $imageProfil = null;
        }
    }
    html($imageProfil);
} catch (PDOException $e) {
    echo $e->getMessage();
}
