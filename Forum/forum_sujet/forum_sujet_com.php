<?php include_once __DIR__ . "/../../Pandora_nav_footer/nav.php";
include_once __DIR__ . "/../../Pandora_nav_footer/footer.php";
include_once __DIR__ . "/../../coucheService/UtilisateurService.php";
include_once __DIR__ . "/../../coucheService/CommentaireForumService.php";


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
                <div class="col-sm-8 col-md-8 col-lg-10 col-xl-10 text-white sujetThForum mb-5">
                    <div class="col-sm-8 col-md-8 col-lg-10 col-xl-10 mx-auto d-block">

                        <div class="row justify-content-center mt-5">
                            <div class="title-forum text-white mb-5">
                                <h1>Questions sur la thématique: <?php if ($sujetTheme) {
                                                                        echo $sujetTheme->getTypeSujetTh();
                                                                    } ?></h1>
                            </div>
                        </div>
                        <div class="row mx-auto d-block">
                            <div class="media ml-5 pt-5">
                                <img class="align-self-center mr-5 border-primary mt-0 rounded-circle shadow-lg ml-5" width="13%" src="images/exempleProfilImage.jpg" alt="Generic placeholder image">
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
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8  rounded mx-auto d-block mt-5 mb-5">
                            <?php
                            if ($sujetTheme) {
                                $commForum = (new CommentaireForumService())->foundComById($sujetTheme->getIdSujetTh());
                                foreach ($commForum as $value) {
                            ?>
                                    <div class="mx-auto d-block col-sm-10 col-md-10 col-lg-10 col-xl-10">

                                        <div class="media mt-5 mb-5 rounded-pill bgComm shadow col-sm-12 col-md-12 col-lg-12 col-xl-12 p-2">
                                            <img class="align-self-center mr-5 border-primary mt-0 rounded-circle shadow-lg ml-5" width="13%" src="images/exempleProfilImage.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-3 mb-3">
                                                    Réponse de: <span class="bg-danger border border-dark p-2 shadow rounded-pill"><?php echo $value->getPseudoUt(); ?></span>
                                                </h5>
                                                <p>
                                                    <?php echo $value->getContCommSuj(); ?>
                                                </p>
                                                <p class="mb-0">Posté le
                                                    <?php echo $value->getDateCommSuj()->format('d-m-Y'); ?>
                                                    <span class="modifElem float-right  btn btn-warning rounded-pill shadow">
                                                        <a href="#" class="modifierSpan">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                            </svg>
                                                        </a>
                                                    </span>
                                                    <span class="float-right  btn btn-danger rounded-pill shadow mr-2">
                                                        <a href="#" class="text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="2rem" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </a>
                                                    </span>
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

                <div class="col-sm-8 col-md-8 col-lg-2 col-xl-2 mt-5">
                    <div class="position-fixed">
                        <button type="button" class="mx-auto d-block btn btn-warning rounded-pill boutonSideInfo" data-toggle="modal" data-target="#modalForumAnnonces">
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
        <!-- Modal -->
        <div class="modal fade" id="modalForumAnnonces" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content modalForum p-4">
                    <h2 class="modal-title text-white mb-3">Commentaire sur Thematique: <?php echo $sujetTheme->getTypeSujetTh(); ?> </h2>
                    <form action="forumcontroleur.php?action=ajout_comm_forum&idsuj=<?php echo $sujetTheme->getIdSujetTh(); ?>" method="POST">
                        <div class="form-group">
                            <label for="titeSujet" class="text-white">Votre réponse:</label>
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
    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </html>
<?php
}
