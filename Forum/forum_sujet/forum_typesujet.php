<?php
include_once __DIR__ . "/../../coucheService/SujetForumService.php";
include_once __DIR__ . "/../../Pandora_nav_footer/nav.php";
include_once __DIR__ . "/../../Pandora_nav_footer/footer.php";
include_once __DIR__ . '/../../coucheService/UtilisateurService.php';

function sujetTypeForum(array $array)
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
                    <p><?php echo $array[0]->getTypeSujetTh(); ?></p>
                </div>
            </div>

            <div class="row">
                <table class="table table-hover table-forum">
                    <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Réponses</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Dernier post</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($array as $value) {
                    ?><tbody>
                            <tr>
                                <td scope="row"><?php echo $value->getTitreSujet(); ?></td>
                                <td>4</td>
                                <td><?php
                                    $utilisateur = new UtilisateurService();
                                    $pseudo = $utilisateur->trouveUtil($value->getIdUti());
                                    echo $pseudo->getPseudo();
                                    ?></td>
                                <td>xx/xx/xxxx</td>
                            </tr>
                        </tbody>
                    <?php
                    } ?>
                </table>
            </div>

            <div class="row justify-content-end ajout-sujet">
                <div>
                    <div class="bg-warning rounded-pill "><a href="#" class="nav-link text-white">Ajouter un sujet</a></div>
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

    </html>
<?php
}
