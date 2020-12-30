<?php
include_once __DIR__ . "/Forum/forum_sujet/forum_typesujet.php";
include_once __DIR__ . "/coucheService/SujetForumService.php";
if (!empty($_GET)) {
    if (isset($_GET['sujet']) && $_GET['sujet'] == "annonces") {
        $sujets = new SujetForumService();
        $array = $sujets->readService();
        sujetTypeForum($array);
    }
}
