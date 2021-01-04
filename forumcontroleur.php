<?php
session_start();
$_SESSION['id'] = 1;
$_SESSION['pseudo'] = 'pseudo1';
include_once __DIR__ . "/Forum/forum_sujet/forum_typesujet.php";
include_once __DIR__ . "/coucheService/SujetForumService.php";
include_once __DIR__ . "/classe_metier/SujetTheme.php";
include_once __DIR__ . "/classe_metier/CommentaireSujet.php";
include_once __DIR__ . "/Forum/forum_sujet/forum_sujet_com.php";
include_once __DIR__ . "/coucheService/CommentaireForumService.php";



if (!empty($_GET)) { // ici je verifie que le get n'est pas empty
    if (
        isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "ajout_comm_forum" && // ici je verifie 
        isset($_GET['idsuj']) && !empty($_GET['idsuj']) && is_numeric($_GET['idsuj']) && !empty($_POST) // les infos de mon get
    ) { // et qu'il s'ajit bien d'un ajout de Comm lié à un sujet dans le forum
        if (!empty($_POST['contCommSuj'])) { // ici je verifie que mon post n'est pas empty
            $idUt = $_SESSION['id'];
            $pseudo = $_SESSION['pseudo'];
            $idSujetForum = htmlspecialchars($_GET['idsuj']);
            $contCommSuj = htmlspecialchars($_POST['contCommSuj']);
            $commSuj = (new CommentaireSujet())->setPseudoUt($pseudo)->setIdUti($idUt)->setContCommSuj($contCommSuj)->setIdSuje($idSujetForum);
            (new CommentaireForumService())->creatService($commSuj);

            $sujets = (new SujetForumService())->readByIdService($idSujetForum);
            SujetThemeForum($sujets);
        }
    } elseif (
        isset($_GET['idCommForum']) && !empty($_GET['idCommForum'])
        && is_numeric($_GET['idCommForum']) && isset($_GET['action']) && isset($_GET['idSujForum']) && !empty($_GET['idSujForum'])
        && is_numeric($_GET['idSujForum']) &&
        !empty($_GET['action']) && $_GET['action'] == 'delete'
    ) {
        $idSuje = (int) htmlspecialchars($_GET['idSujForum']);
        $idCom = htmlspecialchars($_GET['idCommForum']);
        (new CommentaireForumService())->deleteService($idCom);
        $sujets = (new SujetForumService())->readByIdService($idSuje);
        SujetThemeForum($sujets);
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
            sujetTypeForum($array);
        }
    } elseif (isset($_GET['sujetforum']) && !empty($_GET['sujetforum']) && is_numeric($_GET['sujetforum'])) {
        $idSujetForum = htmlspecialchars($_GET['sujetforum']);
        $sujets = (new SujetForumService())->readByIdService($idSujetForum);
        SujetThemeForum($sujets);
    } elseif (isset($_GET['sujet']) && $_GET['sujet'] == "annonces") {
        $sujets = new SujetForumService();
        $array = $sujets->readService();
        sujetTypeForum($array);
    }
}
if (empty($_GET)) {
    $array = (new SujetForumService())->readService();
    sujetTypeForum($array);
}




function boutonFlottant()
{ ?>


    <ul class="bg-warning col-sm-12 col-md-12 col-lg-4 col-xl-4 sideNotifs rounded rounded-pill p-1 mx-auto d-block " id="sideNotifs">
        <li class="mt-5 mx-auto d-block col-sm-12 col-md-12 col-lg-7 col-xl-7"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-chat-left-text mx-auto d-block" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg></a>
        </li>
        <li class="mt-5 mx-auto d-block col-sm-12 col-md-12 col-lg-7 col-xl-7"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-bell mx-auto d-block" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                </svg></a>
        </li>
        <li class="mt-5 mx-auto d-block col-sm-12 col-md-12 col-lg-7 col-xl-7"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-cart3 mx-auto d-block" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg></a>
        </li>
        <li class="mt-5 mb-5 mx-auto d-block col-sm-9 col-md-9 col-lg-7 col-xl-7"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-gear-fill mx-auto d-block" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                </svg></a>
        </li>
    </ul>
    <button type="button" class="boutonSideInfo btn btn-warning col-4 mb-2 rounded rounded p-1 mx-auto d-block"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg></a>
    </button>
<?php }
