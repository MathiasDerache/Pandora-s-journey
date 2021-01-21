<?php
session_start();
include_once __DIR__ . "/../../view/Forum/forum_sujet/forum_typesujet.php";
include_once __DIR__ . "/../../coucheService/SujetForumService.php";
include_once __DIR__ . "/../../classe_metier/SujetTheme.php";
include_once __DIR__ . "/../../classe_metier/CommentaireSujet.php";
include_once __DIR__ . "/../../view/Forum/forum_sujet/forum_sujet_com.php";
include_once __DIR__ . "/../../coucheService/CommentaireForumService.php";
include_once __DIR__ . "/../../coucheService/ServiceException.php";



if (!empty($_GET)) { // ici je vérifie que le get n'est pas empty
    if (
        isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "ajout_comm_forum" && // ici je vérifie 
        isset($_GET['idsuj']) && !empty($_GET['idsuj']) && is_numeric($_GET['idsuj']) && !empty($_POST) // les infos de mon ge
    ) { // et qu'il s'agit bien d'un ajout de Comm lié à un sujet dans le forum
        if (!empty($_POST['contCommSuj'])) { // ici je vérifie que mon post n'est pas empty
            $idUt = $_SESSION['id']; //je récupère l'id user de la session
            $pseudo = $_SESSION['pseudo']; //je récupère le pseudo user de la session

            //je protege les requettes des injections sql
            $idSujetForum = htmlspecialchars($_GET['idsuj']);
            $contCommSuj = htmlspecialchars($_POST['contCommSuj']);

            //je crée un new commentaire et donne les valeur de mes variables aux atributs de cette classe
            $commSuj = (new CommentaireSujet())->setPseudoUt($pseudo)->setIdUti($idUt)->setContCommSuj($contCommSuj)->setIdSuje($idSujetForum);
            try {
                (new CommentaireForumService())->creatService($commSuj); //je donne mon objet commsuj à mon dao en passant par la couche service en passant par la methode creatservice
                $sujet = (new SujetForumService())->readByIdService($idSujetForum); //je recupère l'objet sujet lié à mon commentaire
            } catch (ServiceException $th) {
                //throw $th;
            }
            SujetThemeForum($sujet, null); // j'affiche la page sujet forum en lien avec mon commentaire après avoir mis en argu à ma fonction mon objet sujet



        } else {
            header("location: forumcontrolleur.php?page=1");
        }
    } elseif (
        isset($_GET['idCommForum']) && !empty($_GET['idCommForum'])
        && is_numeric($_GET['idCommForum']) && isset($_GET['action']) && isset($_GET['idSujForum']) && !empty($_GET['idSujForum']) // ici je verifie les infos present dans mon get
        && is_numeric($_GET['idSujForum']) &&
        !empty($_GET['action']) && $_GET['action'] == 'delete' // et que l'action est bien une supression
    ) {
        $idSuje = (int) htmlspecialchars($_GET['idSujForum']);
        $idCom = htmlspecialchars($_GET['idCommForum']);
        (new CommentaireForumService())->deleteService($idCom);
        $sujets = (new SujetForumService())->readByIdService($idSuje);
        SujetThemeForum($sujets, null); //



    } elseif (
        isset($_GET["idCommForum"]) && !empty($_GET["idCommForum"]) && isset($_GET["idSujForum"]) && !empty($_GET["idSujForum"]) && isset($_GET["actionmodif"])
        && !empty($_GET["actionmodif"]) && $_GET["actionmodif"] == "recupe_pour_modif"
    ) {
        $idSujet = htmlspecialchars($_GET["idSujForum"]);
        $idCom = htmlspecialchars($_GET["idCommForum"]);
        $comPourModif = (new CommentaireForumService())->readByIdService($idCom);
        $sujets = (new SujetForumService())->readByIdService($idSujet, $comPourModif);
        SujetThemeForum($sujets, null); //



    } elseif (
        isset($_GET["action"]) && !empty($_GET["action"]) && $_GET["action"] == "modifCommForum"
        && isset($_GET["idcom"]) && !empty($_GET["idcom"]) && isset($_GET["idSujForum"]) && !empty($_GET["idSujForum"])
    ) {
        if (isset($_POST) && !empty($_POST)) {
            $idcom = htmlspecialchars($_GET["idcom"]);
            $idSujForum = htmlspecialchars($_GET["idSujForum"]);
            $contCommSuj = htmlspecialchars($_POST["contCommSuj"]);
            $comForum = (new CommentaireForumService())->readByIdService($idcom);
            $comForum->setContCommSuj($contCommSuj);
            (new CommentaireForumService())->updateService($comForum);
            header("location: forumcontrolleur.php?sujetforum=$idSujForum");
        }
        echo "ok my man!!!";
    } elseif (isset($_GET['action']) && $_GET['action'] == "ajout_Sujet_forum") {
        if (
            isset($_POST['typeSujetTh']) && !empty($_POST['typeSujetTh'])
            && isset($_POST['questionSujet']) && !empty($_POST['questionSujet'])
        ) {
            $idUtil = $_SESSION['id'];
            $typeSujetTh = htmlspecialchars($_POST['typeSujetTh']);
            $questionSujet = htmlspecialchars($_POST['questionSujet']);
            $sujet = (new SujetTheme())->setIdUti($idUtil)->setTypeSujetTh($typeSujetTh)->setQuestionSujet($questionSujet);
            (new SujetForumService())->creatService($sujet);
            $array = (new SujetForumService())->readService();
            header("location: forumcontrolleur.php?page=1");
        }
    } elseif (isset($_GET['sujetforum']) && !empty($_GET['sujetforum']) && is_numeric($_GET['sujetforum'])) {
        $idSujetForum = htmlspecialchars($_GET['sujetforum']);
        $sujets = (new SujetForumService())->readByIdService($idSujetForum);
        SujetThemeForum($sujets, null); //



    } elseif (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = htmlspecialchars($_GET['page']);
        if (isset($_GET['theme'])) {
            $theme = htmlspecialchars($_GET['theme']);
        } else {
            $theme = null;
        }
        $array = (new SujetForumService())->readService(
            $page,
            $theme
        );
        sujetTypeForum($array);
    }
}
if (empty($_GET)) {
    header("location: forumcontrolleur.php?page=1");
}
