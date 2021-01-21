<?php
session_start();
// Deconnexion
if (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "deconnexion") {
    session_destroy();
    header('Location: ../accueil/accueilController.php');
}

require_once __DIR__ . "/../../classe_metier/Utilisateur.php";
require_once __DIR__ . "/../../coucheService/UtilisateurService.php";

$utilisateur = new Utilisateur();
$utilisateurService = new UtilisateurService();

// Connexion
if (
    isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] === "connexion"
    && isset($_POST["email"]) && !empty($_POST["email"])
    && isset($_POST["password"]) && !empty($_POST["password"])
) {
    $email = htmlentities($_POST["email"]);
    $password = htmlentities(($_POST["password"]));

    $utilisateur->setEmail($email)
        ->setPassword($password);

    try {
        $userData = $utilisateurService->searchByEmailService($email);
        if ($userData) {
            $connexionData = $utilisateurService->connexion($utilisateur, $userData);
            if ($connexionData) {
                $_SESSION["id"] = $connexionData->getIdUti();
                $_SESSION["nom"] = $connexionData->getNom();
                $_SESSION["prenom"] = $connexionData->getPrenom();
                $_SESSION["pseudo"] = $connexionData->getPseudo();
                $_SESSION["email"] = $connexionData->getEmail();
                $_SESSION["numTel"] = $connexionData->getNumTel();
                $_SESSION["password"] = $connexionData->getPassword();
                $_SESSION["profil"] = $connexionData->getProfil();
                $_SESSION["dateNaissance"] = $connexionData->getDateNaissance();
                $_SESSION["civilite"] = $connexionData->getCivilite();
                header('Location: ../profil/profilControleur.php');
            } else {
                header('Location: ../accueil/accueilController.php?action=erreur_mdp');
            }
        } else {
            header('Location: ../accueil/accueilController.php?action=erreur_email');
        }
    } catch (ServiceException $e) {
        echo $e->getMessage();
    }
}
// Inscription
elseif (
    isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] === "inscription"
    && isset($_POST["nom"]) && !empty($_POST["nom"])
    && isset($_POST["prénom"]) && !empty($_POST["prénom"])
    && isset($_POST["pseudo"]) && !empty($_POST["pseudo"])
    && isset($_POST["email"]) && !empty($_POST["email"])
    && isset($_POST["téléphone"]) && !empty($_POST["téléphone"])
    && isset($_POST["password"]) && !empty($_POST["password"])
    && isset($_POST["date"]) && !empty($_POST["date"])
    && isset($_POST["civilité"]) && !empty($_POST["civilité"])
) {
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prénom"]);
    $pseudo = htmlentities($_POST["pseudo"]);
    $email = htmlentities($_POST["email"]);
    $numTel = htmlentities($_POST["téléphone"]);
    $password = htmlentities($_POST["password"]);
    $dateNaissance = htmlentities($_POST["date"]);
    $civilite = $_POST["civilité"];
    $profil = "user";

    $utilisateur->setNom($nom)
        ->setPrenom($prenom)
        ->setPseudo($pseudo)
        ->setEmail($email)
        ->setNumTel($numTel)
        ->setPassword($password)
        ->setDateNaissance(new DateTime($dateNaissance))
        ->setCivilite($civilite)
        ->setProfil($profil);

    try {
        $userData = $utilisateurService->searchByEmailService($email);
        if (!isset($userData)) {
            $utilisateurService->creatService($utilisateur);
            $userData = $utilisateurService->searchByEmailService($email);
            $_SESSION["id"] = $userData->getIdUti();
            $_SESSION["nom"] = $userData->getNom();
            $_SESSION["prenom"] = $userData->getPrenom();
            $_SESSION["pseudo"] = $userData->getPseudo();
            $_SESSION["email"] = $userData->getEmail();
            $_SESSION["numTel"] = $userData->getNumTel();
            $_SESSION["password"] = $userData->getPassword();
            $_SESSION["profil"] = $userData->getProfil();
            $_SESSION["dateNaissance"] = $userData->getDateNaissance();
            $_SESSION["civilite"] = $userData->getCivilite();
            header('Location: ../profil/profilControleur.php');
        } else {
            header('Location: ../accueil/accueilController.php?action=erreur_inscription_email');
        }
    } catch (ServiceException $e) {
        echo $e->getMessage();
    }
}
