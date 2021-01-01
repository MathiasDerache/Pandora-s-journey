<?php
session_start();
$_SESSION['id'] = 1;
include_once __DIR__ . "/Forum/forum_sujet/forum_typesujet.php";
include_once __DIR__ . "/coucheService/SujetForumService.php";
include_once __DIR__ . "/classe_metier/SujetTheme.php";

if (!empty($_GET)) {
    if (isset($_GET['action']) && $_GET['action'] == "ajout_Sujet_forum") {
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
            sujetTypeForum($array);
        }
    } elseif (isset($_GET['sujet']) && $_GET['sujet'] == "annonces") {
        $sujets = new SujetForumService();
        $array = $sujets->readService();
        sujetTypeForum($array);
    }
}
$array = (new SujetForumService())->readService();
sujetTypeForum($array);
