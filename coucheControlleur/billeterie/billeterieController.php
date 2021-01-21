<?php
session_start();
include_once("../../Pandora_nav_footer/nav.php");
include_once("../../Pandora_nav_footer/footer.php");
include_once("../../view/billeterie/index.php");
include_once("../../classe_metier/Billet.php");
include_once("../../coucheService/BilletService.php");
include_once("../../coucheDAO/BilletDAO.php");


head();
navBar();

if (!empty($_POST) && isset($_GET["action"]) && $_GET["action"] == "ajout") {

    $billet = new Billet();

    $date = htmlentities($_POST['date']);

    $billet->setDateEmb(new DateTime($date))->setIdUti($_SESSION["id"]);
    try {

        $service = new BilletService();
        $service->creatService($billet);      // ajout billet

        // envoie mail de confiramtion
        $reponse = "Félicitation !
        \nVotre nouvelle vie commence bientôt ! 
        \nN'hésiter pas à consulter et interagir sur le forum pour préparer au mieux votre départ !
        \nSi vous avez des questions où d'autres demandes concernant votre voyage contacter nous depuis la rubrique Contact du site.
        \nNous vous souhaitons bon voyage, 
        \nL'équipe Pandora's Journey";
        mail($_SESSION["email"], "Confirmation de votre vol", $reponse);

        billetValidation();
    } catch (ServiceException $se) {
        afficheErreurAjout($se->getMessage(), $se->getCode());
    }
}
etapes();
complementaire();
if (isset($_SESSION) && !empty($_SESSION)) {
    formulaireVol();
    select();
    suiteFormulaireVol();
}
footer();
