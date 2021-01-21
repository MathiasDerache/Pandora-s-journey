<?php
include_once __DIR__ . "/../../../coucheService/SujetForumService.php";
include_once __DIR__ . "/../../../Pandora_nav_footer/nav.php";
include_once __DIR__ . "/../../../Pandora_nav_footer/footer.php";
include_once __DIR__ . '/../../../coucheService/UtilisateurService.php';
include_once __DIR__ . '/../../../coucheService/CommentaireForumService.php';

function sujetTypeForum(array $array = [])
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
        <title>Forum annonces</title>
    </head>

    <body class="position-relative">
        <!-- ----------------------------------  navbar --------------------------------->
        <?php
        navBar();
        ?>
        <!-- ----------------------------------  navbar --------------------------------->

        <!-- ----------------------------------  forum --------------------------------->

        <div class="container-fluid forum">

            <div class="row justify-content-center">
                <div class="title-forum">
                    <p>
                        Forum Pandora
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle rounded-pill font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Choix thématique
                    </button>
                    <div class="dropdown-menu  bg-dark" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-danger font-weight-bold" href="forumcontrolleur.php">Retour à la thématique générale</a>
                        <a class="dropdown-item text-danger font-weight-bold" href="forumcontrolleur.php?page=<?php echo $_GET['page']; ?>&theme=Immobilier">Immobilier</a>
                        <a class="dropdown-item text-danger font-weight-bold" href="forumcontrolleur.php?page=<?php echo $_GET['page']; ?>&theme=Travail">Travail</a>
                        <a class="dropdown-item text-danger font-weight-bold" href="forumcontrolleur.php?page=<?php echo $_GET['page']; ?>&theme=Loisirs">Loisirs</a>
                        <a class="dropdown-item text-danger font-weight-bold" href="forumcontrolleur.php?page=<?php echo $_GET['page']; ?>&theme=Discussionsgenerales">Discusions générales</a>
                    </div>
                </div>
                <table class="table table table-forum">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Questions sur la thématique</th>
                            <th scope="col">Thématique</th>
                            <th scope="col">Réponses</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Date d'ajout</th>
                            <th scope="col">Accéder à la discussion</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($array)) {
                        foreach ($array[0] as $value) {
                    ?>
                            <tbody>
                                <tr>
                                    <td scope=" row"><?php echo $value->getQuestionSujet(); ?></td>
                                    <td scope="row"><?php echo $value->getTypeSujetTh(); ?></td>
                                    <td>
                                        <?php
                                        $newCom = (new CommentaireForumService())->foundComById($value->getIdSujetTh());
                                        $compt = 0;
                                        foreach ($newCom as $val) {
                                            $compt++;
                                        }
                                        echo $compt;
                                        ?>
                                    </td>
                                    <td><?php
                                        $utilisateur = new UtilisateurService();
                                        $pseudo = $utilisateur->readByIdService($value->getIdUti());
                                        echo $pseudo->getPseudo();
                                        ?>
                                    </td>
                                    <td scope="row"><?php echo $value->getDateAjout()->format('d-m-Y'); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger rounded-pill ">
                                            <a href="forumcontrolleur.php?sujetforum=<?php echo $value->getIdSujetTh(); ?>" style="text-decoration: none;" class=" text-white">Discussion</a>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    } ?>
                </table>
            </div>
            <?php
            if (isset($_SESSION) && !empty($_SESSION)) { ?>
                <div class=" row justify-content-end ajout-sujet">
                    <div>
                        <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalForumAnnonces">Ajouter un sujet</div>
                    </div>
                </div>
            <?php }
            ?>
            <!-- Modal -->
            <div class="modal fade" id="modalForumAnnonces" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modalForum p-4">
                        <h2 class="modal-title text-white mb-3">Ajoutez un Sujet de discussion</h2>
                        <form action="forumcontrolleur.php?action=ajout_Sujet_forum" method="POST">
                            <div class="form-group">
                                <label class="text-white" for="typeSujetTh">Selectionnez un thème:</label>
                                <select class="form-control" name="typeSujetTh" id="typeSujetTh">
                                    <option class="font-weight-bold" value="Travail">Travail</option>
                                    <option class="font-weight-bold" value="Loisirs">Loisirs</option>
                                    <option class="font-weight-bold" value="Immobilier">Immobilier</option>
                                    <option class="font-weight-bold" value="Discusions générales">Discusion générales</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titeSujet" class="text-white">Posez votre question:</label>
                                <textarea class="form-control" name="questionSujet" id="questionSujet" cols="1" rows="1" required></textarea>
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
        <!-- ----------------------------------  pagination --------------------------------->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mx-auto">
                            <ul class="pagination">
                                <li class="page-item <?php if ($_GET['page'] == 1) {
                                                            echo "disabled";
                                                        } ?>">
                                    <a class="text-white bg-info page-link " href="forumcontrolleur.php?page=<?php if ($_GET['page'] > 1 && isset($_GET['theme'])) {
                                                                                                                    echo ($_GET['page'] - 1) . "&theme=" . $_GET['theme'];
                                                                                                                } elseif ($_GET['page'] > 1) {
                                                                                                                    echo $_GET['page'] - 1;
                                                                                                                }  ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $array[1]; $i++) {
                                ?>
                                    <li class="page-item <?php
                                                            if ($_GET['page'] == $i) {
                                                                echo "disabled";
                                                            }
                                                            ?> ">
                                        <a class="text-white bg-info page-link" href="forumcontrolleur.php?page=<?php if (isset($_GET['theme'])) {
                                                                                                                    echo $i . "&theme=" . $_GET['theme'];
                                                                                                                } else {
                                                                                                                    echo $i;
                                                                                                                }
                                                                                                                ?>"><?php echo $i; ?>
                                        </a>
                                    </li><?php
                                        } ?>
                                <li class="page-item <?php if ($_GET['page'] >= $array[1]) {
                                                            echo "disabled";
                                                        } ?>">
                                    <a class="text-white bg-info page-link" href="forumcontrolleur.php?page=<?php if ($_GET['page'] <= $array[1] && isset($_GET['theme'])) {
                                                                                                                echo ($_GET['page'] + 1) . "&theme=" . $_GET['theme'];
                                                                                                            } elseif ($_GET['page'] <= $array[1]) {
                                                                                                                echo $_GET['page'] + 1;
                                                                                                            }  ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </html>
<?php
}
