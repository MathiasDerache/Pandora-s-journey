<?php
include_once __DIR__ . "/../../../Pandora_nav_footer/nav.php";
include_once __DIR__ . "/../../../Pandora_nav_footer/footer.php";
include_once __DIR__ . "/../../../coucheService/UtilisateurService.php";
include_once __DIR__ . "/../../../coucheService/CommentaireForumService.php";
include_once __DIR__ . "/../../../coucheService/ImageService.php";


function SujetThemeForum(SujetTheme $sujetTheme, ?CommentaireSujet $comUpdate)
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
        <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Forum travail</title>
    </head>

    <body class="position-relative">
        <!-- ----------------------------------  navbar --------------------------------->
        <?php
        navBar();
        ?>
        <!-- ----------------------------------  navbar --------------------------------->

        <!-- ----------------------------------  forum --------------------------------->

        <div class="container-fluid forum m-5">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-10 col-xl-10 text-white sujetThForum mb-5">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto d-block">
                        <div class="position-fixed mt-3 ">
                            <a href="forumcontrolleur.php">
                                <button type="button" class="btn btn-warning rounded-pill text-white">
                                    <span class="material-icons" style="vertical-align: middle;">
                                        west
                                    </span>
                                    Tableau thématique
                                </button>
                            </a>
                        </div>
                        <div class="row justify-content-center mt-5">

                            <div class="title-forum text-white mb-5">
                                <h1>Questions sur la thématique: <?php if ($sujetTheme) {
                                                                        echo $sujetTheme->getTypeSujetTh();
                                                                    } ?></h1>
                            </div>
                        </div>
                        <div class="row mx-auto d-block">
                            <div class="media ml-5 pt-5">
                                <?php
                                $imageService = new ImageService();
                                $arrayImage = $imageService->readService();
                                if (!empty($arrayImage)) {
                                    foreach ($arrayImage as $val) {
                                        $nomFichierProfil = strstr($val->getNomFichier(), '.', true);
                                        if ($nomFichierProfil === "profil_Id" . $sujetTheme->getIdUti()) {
                                            $nomFichierProfil = $val->getNomFichier();
                                            $imageProfil = $imageService->searchImageProfilService($nomFichierProfil);
                                            break;
                                        } else {
                                            $imageProfil = null;
                                        }
                                    }
                                } else {
                                    $imageProfil = null;
                                }
                                if (empty($imageProfil)) {
                                    echo '<img src="../../view/profil/imageProfil/exempleProfilImage.jpg" class="align-self-center mr-5 border-primary mt-0 rounded-circle shadow-lg ml-5" width="13%">';
                                } else {
                                    echo '<img src="../../view/profil/imageProfil/' . $imageProfil[0]["NomFichier"] . '" class="align-self-center mr-5 border-primary mt-0 rounded-circle shadow-lg ml-5" width="13%">';
                                }
                                ?>
                                <div class="media-body mt-5">
                                    <h5 class="mt-0 ">Auteur : <?php
                                                                if ($sujetTheme) {
                                                                    $utilisateur = new UtilisateurService();
                                                                    $pseudoUtil = $utilisateur->readByIdService($sujetTheme->getIdUti());
                                                                }
                                                                ?>
                                        <span class="bg-danger border border-dark p-2 shadow rounded-pill"><?php if ($sujetTheme) {
                                                                                                                echo $pseudoUtil->getPseudo();
                                                                                                            } ?></span><?php
                                                                                                                        ?>
                                    </h5>
                                    <h3 class="mt-3">
                                        <?php if ($sujetTheme) {
                                            echo $sujetTheme->getQuestionSujet();
                                        } ?>
                                    </h3>
                                    <p class="mb-0">Publié le <?php if ($sujetTheme) {
                                                                    echo $sujetTheme->getDateAjout()->format("d-m-Y");
                                                                } ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12  rounded mx-auto d-block mt-5 mb-5">
                            <?php
                            if ($sujetTheme) {
                                $commForum = (new CommentaireForumService())->foundComById($sujetTheme->getIdSujetTh());
                                foreach ($commForum as $value) {
                            ?>
                                    <div class="mx-auto d-block col-sm-10 col-md-10 col-lg-10 col-xl-10">

                                        <div class="media mt-5 mb-5 rounded-pill bgComm shadow col-sm-12 col-md-12 col-lg-12 col-xl-12 p-2">
                                            <?php
                                            $imageService = new ImageService();
                                            $arrayImage = $imageService->readService();
                                            if (!empty($arrayImage)) {
                                                foreach ($arrayImage as $val) {
                                                    $nomFichierProfil = strstr($val->getNomFichier(), '.', true);
                                                    if ($nomFichierProfil === "profil_Id" . $value->getIdUti()) {
                                                        $nomFichierProfil = $val->getNomFichier();
                                                        $imageProfil = $imageService->searchImageProfilService($nomFichierProfil);
                                                        break;
                                                    } else {
                                                        $imageProfil = null;
                                                    }
                                                }
                                            } else {
                                                $imageProfil = null;
                                            }
                                            if (empty($imageProfil)) {
                                                echo '<img src="../../view/profil/imageProfil/exempleProfilImage.jpg" class="align-self-center mr-5 border-primary my-2 rounded-circle shadow-lg ml-5" width="13%">';
                                            } else {
                                                echo '<img src="../../view/profil/imageProfil/' . $imageProfil[0]["NomFichier"] . '" class="align-self-center mr-5 border-primary my-2 rounded-circle shadow-lg ml-5" width="13%">';
                                            }
                                            ?>
                                            <div class="media-body">
                                                <h5 class="mt-3 mb-3">
                                                    Réponse de: <span class="bg-danger border border-dark p-2 shadow rounded-pill"><?php echo $value->getPseudoUt(); ?></span>
                                                </h5>
                                                <p>
                                                    <?php echo $value->getContCommSuj(); ?>
                                                </p>
                                                <p class="mb-0">Posté le
                                                    <?php echo $value->getDateCommSuj()->format('d-m-Y'); ?>
                                                    <?php
                                                    if (isset($_SESSION) && !empty($_SESSION) && $_SESSION["id"] == $value->getIdUti()) { ?>
                                                        <span class="modifElem float-right  btn btn-warning rounded-pill shadow">
                                                            <a href="forumcontrolleur.php?idSujForum=<?php echo $value->getIdSuje(); ?>&idCommForum=<?php echo $value->getIdCommSuj(); ?>&actionmodif=recupe_pour_modif" class="modifierSpan">
                                                                <span class="material-icons m-1" style="font-size:x-large;">
                                                                    create
                                                                </span>
                                                            </a>
                                                        </span>
                                                        <span class="float-right  btn btn-danger rounded-pill shadow  mr-2">
                                                            <a href="forumcontrolleur.php?idCommForum=<?php echo $value->getIdCommSuj(); ?>&idSujForum=<?php echo $value->getIdSuje(); ?>&action=delete" class="text-white">
                                                                <span class="material-icons m-1 " style="font-size:x-large;">
                                                                    clear
                                                                </span>
                                                            </a>
                                                        </span>
                                                    <?php } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_SESSION) && !empty($_SESSION)) { ?>
                    <div class=" col-sm-4 col-md-4 col-lg-2 col-xl-2 mt-5">
                        <div class="position-fixed">
                            <button type="button" class="mx-auto d-block btn btn-warning rounded-pill boutonSideInfo" data-toggle="modal" data-target="#modalForumAnnonces">
                                <a href="#">
                                    <span class="material-icons text-white m-1 font-weight-bold " style="font-size:x-large;">
                                        add
                                    </span>
                                </a>
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <!-- ----------------------------------  pagination --------------------------------->
        <?php if (isset($_GET['actionmodif']) == "recupe_pour_modif") {
        ?>
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#modalForumAnnonces').modal('show');
                });
            </script>
        <?php
        }
        ?>
        <!-- ---------------------------------- fin forum --------------------------------->

        <!-- Modal -->
        <div class="modal fade" id="modalForumAnnonces" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content modalForum p-4">
                    <h2 class="modal-title text-white mb-3"><?php if (isset($_GET['actionmodif'])) {
                                                                echo 'Modification commentaire';
                                                            } else {
                                                                echo "Ajouter commentaire";
                                                            } ?> </h2>

                    <form action=" forumcontrolleur.php?action=<?php if (isset($_GET['actionmodif'])) {
                                                                    $com = (new CommentaireForumService())->readByIdService($_GET['idCommForum']);
                                                                    echo "modifCommForum&idcom=" . $com->getIdCommSuj() . "&idSujForum=" . $_GET['idSujForum'];
                                                                } else {
                                                                    echo "ajout_comm_forum&idsuj=" . $sujetTheme->getIdSujetTh();
                                                                } ?>" method="POST">
                        <div class="form-group">
                            <label for="titeSujet" class="text-white"><?php if (isset($_GET['actionmodif'])) {
                                                                            echo "redigez votre correction ci-dessous:";
                                                                        } else {
                                                                            echo "Votre réponse:";
                                                                        } ?></label>
                            <textarea class="form-control" name="contCommSuj" id="questionSujet" cols="10" rows="10" placeholder="Rediger votre réponse ici..."></textarea>
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!-- ----------------------------------  FOOTER --------------------------------->
        <footer>
            <?php
            footer();
            ?>
        </footer>
        <!-- ----------------------------------  FIN_FOOTER --------------------------------->
    </body>


    </html>
<?php

}
