<?php
require_once __DIR__ . "/../../view/contact/contact.php";

$erreur = null;

// Envoie du formulaire par mail et envoie confirmation de réception par mail.
if (
    isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "envoieMail"
    && isset($_POST["civilité"]) && !empty($_POST["civilité"])
    && isset($_POST["nom"]) && !empty($_POST["nom"])
    && isset($_POST["prenom"]) && !empty($_POST["prenom"])
    && isset($_POST["email"]) && !empty($_POST["email"])
    && isset($_POST["téléphone"]) && !empty($_POST["téléphone"])
    && isset($_POST["message"]) && !empty($_POST["message"])
) {
    try {
        $civilite = htmlentities($_POST["civilité"]);
        $nom = htmlentities($_POST["nom"]);
        $prenom = htmlentities($_POST["prenom"]);
        $email =  htmlentities($_POST["email"]);
        $telephone = htmlentities($_POST["téléphone"]);
        $message = htmlentities($_POST["message"]);

        $contenuMessage = "Civilité : " . $civilite . "\nNom : " . $nom . "\nPrénom : " . $prenom .
            "\nEmail : " . $email . "\nTéléphone : " . $telephone . "\nMessage : \n" . $message;

        $destination = "contact.pandorajourney@gmail.com";

        $result = mail($destination, "Formulaire de contact", $contenuMessage);

        if ($result) {
            $reponse = "Bonjour,
            \nNous vous remercions de nous avoir contacté, votre demande a bien été prise en compte.
            \nNous nous efforçons d'y répondre dans les plus brefs délais.
            \nNous vous souhaitons une très bonne journée.
            \nPandora's Journey";
            mail($email, "Email de confirmation de votre demande", $reponse);
        }
    } catch (Exception $e) {
        $erreur = $e->getCode();
    }
    header("Location: contactControlleur.php?action=confirmation");
} elseif (isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "confirmation") {
    header("refresh:8;url=../../pandora_accueil/Index.php");
    html($erreur);
} else {
    html($erreur);
}
