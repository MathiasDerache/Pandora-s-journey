<?php include_once __DIR__ . "/../../Pandora_nav_footer/nav.php";
include_once __DIR__ . "/../../Pandora_nav_footer/footer.php";
include_once __DIR__ . "/../../coucheService/UtilisateurService.php";

function SujetThemeForum(SujetTheme $sujetTheme = null)
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
        <title>Forum travail</title>
    </head>

    <body class="position-relative">
        <!-- ----------------------------------  navbar --------------------------------->
        <?php
        navBar()
        ?>
        <!-- ----------------------------------  navbar --------------------------------->

        <!-- ----------------------------------  forum --------------------------------->

        <div class="container-fluid forum m-5">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-10 col-xl-10 text-white sujetThForum mb-5 mt-5">
                    <div class="row justify-content-center mt-5">
                        <div class="title-forum text-white mb-5">
                            <h1>Questions sur la thématique: <?php if ($sujetTheme) {
                                                                    echo $sujetTheme->getTypeSujetTh();
                                                                } ?></h1>
                        </div>
                    </div>
                    <div class="row mx-auto d-block">
                        <div class="media ml-5 pt-5">
                            <img class="align-self-center mr-5 border-dark mt-0 rounded-circle shadow-lg ml-5" width="13%" src="images/profil_Id1.gif" alt="Generic placeholder image">
                            <div class="media-body mt-5">
                                <h5 class="mt-0 ">Auteur : <?php
                                                            if ($sujetTheme) {
                                                                $utilisateur = new UtilisateurService();
                                                                $pseudo = $utilisateur->trouveUtil($sujetTheme->getIdUti());
                                                            }
                                                            ?>
                                    <span class="bg-danger border border-dark p-2 shadow rounded-pill"><?php if ($sujetTheme) {
                                                                                                            echo $pseudo->getPseudo();
                                                                                                        } ?></span><?php
                                                                                                                    ?></h5>
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
                <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2 mt-5 ">

                    <div class="position-fixed">
                        <button type="button" class="mx-auto d-block btn btn-warning rounded-pill boutonSideInfo">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2rem" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </a>
                        </button>
                        <?php boutonFlottant() ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ----------------------------------  pagination --------------------------------->

        <!-- ---------------------------------- fin forum --------------------------------->

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
