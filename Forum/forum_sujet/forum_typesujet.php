<?php
include_once __DIR__ . "/../../coucheService/SujetForumService.php";
include_once __DIR__ . "/../../Pandora_nav_footer/nav.php";
include_once __DIR__ . "/../../Pandora_nav_footer/footer.php";
include_once __DIR__ . '/../../coucheService/UtilisateurService.php';
include_once __DIR__ . '/../../coucheService/CommentaireForumService.php';

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
        navBar()
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
                <table class="table table-hover table-forum">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Questions sur le thème des thématique</th>
                            <th scope="col">Réponses</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Date d'ajout</th>
                            <th scope="col">Accéder à la discussion</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($array as $value) {
                    ?>if(!empty($array)){
                    <tbody>
                        <tr>
                            <td scope="row"><?php echo $value->getQuestionSujet(); ?></td>
                            <td>
                                <?php
                                $newCom = (new CommentaireForumService())->foundComById($value->getIdSujetTh());
                                $compt = 0;
                                foreach ($newCom as $value) {
                                    $compt++;
                                }
                                echo $compt;
                                ?>
                            </td>
                            <td><?php
                                $utilisateur = new UtilisateurService();
                                $pseudo = $utilisateur->trouveUtil($value->getIdUti());
                                echo $pseudo->getPseudo();
                                ?>
                            </td>
                            <td scope="row"><?php echo $value->getDateAjout()->format('d-m-Y'); ?></td>
                            <td>
                                <button type="button" class="btn btn-danger rounded-pill ">
                                    <a href="#" style="text-decoration: none;" class=" text-white">discussion</a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    }
                <?php
                    } ?>
                </table>
            </div>

            <div class="row justify-content-end ajout-sujet">
                <div>
                    <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalForumAnnonces">Ajouter un sujet</div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalForumAnnonces" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modalForum p-4">
                        <h2 class="modal-title text-white mb-3">Ajoutez un Sujet de discussion</h2>
                        <form action="forumcontroleur.php?action=ajout_Sujet_forum" method="POST">
                            <div class="form-group">
                                <label class="text-white" for="typeSujetTh">Selectionnez un thème:</label>
                                <select class="form-control" name="typeSujetTh" id="typeSujetTh">
                                    <option class="font-weight-bold" value="Annonces" selected>Annonces</option>
                                    <option class="font-weight-bold" value="Travail">Travail</option>
                                    <option class="font-weight-bold" value="Loisirs">Loisirs</option>
                                    <option class="font-weight-bold" value="Immobilier">Immobilier</option>
                                    <option class="font-weight-bold" value="Discusion_generales">Discusion générales</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titeSujet" class="text-white">Posez votre question:</label>
                                <textarea class="form-control" name="questionSujet" id="questionSujet" cols="1" rows="1"></textarea>
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
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
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
