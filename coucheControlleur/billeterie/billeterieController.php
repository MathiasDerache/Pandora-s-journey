<?php
session_start();

include_once("../../Pandora_nav_footer/nav.php");
include_once("../../Pandora_nav_footer/footer.php");
include_once("../../view/billeterie/index.php");
include_once("../../classe_metier/Billet.php");
include_once("../../coucheService/BilletService.php");
include_once("../../coucheDAO/BilletDAO.php");

if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajout') { 

        $billet = new Billet();     

        $billet->setIdUti($_SESSION["id"]);                                        

        $date = htmlentities($_POST['date']);

        $billet->setDateEmb($date)->setIdUti($_SESSION["id"]);
        try{

        BilletService::creat($billet);      // ajout billet

        }catch(ServiceException $se){
        afficheErreurAjout($se->getMessage(), $se->getCode());
        }          
    }

head();
navBar();
etapes();
complementaire();
formulaireVol();
select();
suiteFormulaireVol();
footer();
?>