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
                                                    <span class="modifElem float-right  btn btn-warning rounded-pill shadow ">
                                                        <a href="#" class="">
                                                            <span class="apparait">Modifier</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                                                <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z" />
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
