<?php
include_once __DIR__ . "/../../Pandora_nav_footer/footer.php";
include_once __DIR__ . "/../../Pandora_nav_footer/nav.php";

function html($imageProfil, $dataUtilisateur, $banniereProfil, $arraySujet, $erreur, $arrayReponse)
{
    htmlHeader();
    htmlbody($imageProfil, $dataUtilisateur, $banniereProfil, $arraySujet, $erreur, $arrayReponse);
}

function htmlHeader()
{ ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="jquery-fab-button/css/jquery-fab-button.css">
        <link rel="stylesheet" href="../../view/profil/Style.css">
        <title>Page Profil</title>
    </head>
<?php }

function htmlbody($imageProfil, $dataUtilisateur, $banniereProfil, $arraySujet, $erreur, $arrayReponse)
{ ?>

    <body>
        <!-- ---------------------------------- Popup image ---------------------------------- -->
        <?php popupFormImageProfil();
        popupFormBanniereProfil();
        popupInfoProfil($dataUtilisateur);
        popupErreur($erreur); ?>
        <!-- ---------------------------------- Fin popup image ---------------------------------- -->
        <!-- ----------------------------------  navbar --------------------------------->
        <?php
        navBar();
        ?>
        <!-- ----------------------------------  navbar --------------------------------->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12col-lg-12 pt-5">
                    <h1 class="text-center mt-5 profilTitre">PAGE PROFIL</h1>
                    <hr>
                    <?php banniere($banniereProfil); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 profilDetails">
                    <div class="row">
                        <?php compteARebours(); ?>
                    </div>
                    <div class="row">
                        <?php vosSujets($arraySujet, $arrayReponse); ?>
                    </div>
                </div>
                <?php infoProfil($imageProfil, $dataUtilisateur); ?>
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
<?php }

function infoProfil($imageProfil, $dataUtilisateur)
{ ?>
    <div class="col-sm-12 col-md-12 col-lg-4 infoUti">
        <div class="card-dark col-12  mt-2 mb-3">
            <div class="card-body">
                <div class="mb-5">
                    <?php
                    if (empty($imageProfil)) {
                        echo '<img src="../../view/profil/imageProfil/exempleProfilImage.jpg" class="rounded-circle mx-auto d-block m-2 shadow-lg img_profil">';
                    } else {
                        echo '<img src="../../view/profil/imageProfil/' . $imageProfil[0]["NomFichier"] . '" class="rounded-circle mx-auto d-block m-2 shadow-lg img_profil">';
                    }
                    ?>
                    <div class="container">
                        <div class="text-center pt-2">
                            <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalProfil">Modifier l'image du profil</div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($dataUtilisateur)) { ?>
                    <h4 class="text-center text-white m-4"><?php echo ucfirst(strtolower($dataUtilisateur->getCivilite())); ?></h4>
                    <h4 class="text-center text-white mb-4"><?php echo strtoupper($dataUtilisateur->getNom()); ?></h4>
                    <h4 class="text-center text-white mb-4"><?php echo ucfirst(strtolower($dataUtilisateur->getPrenom())); ?></h4>
                    <h4 class="text-center text-white mb-4"><?php echo $dataUtilisateur->getPseudo(); ?></h4>
                    <h4 class="text-center text-white mb-4 email"><?php echo $dataUtilisateur->getEmail(); ?></h4>
                    <h4 class="text-center text-white m-4"><?php $date = $dataUtilisateur->getDateNaissance();
                                                            $dateNow = new DateTime();
                                                            $age = $date->diff($dateNow);
                                                            echo $age->format('%y ans'); ?></h4>
                    <h4 class="text-center text-white m-4"><?php echo $dataUtilisateur->getNumTel(); ?></h4>
                <?php } else { ?>
                    <h4 class="text-center text-white mb-4">CIVILITE</h4>
                    <h4 class="text-center text-white mb-4">NOM</h4>
                    <h4 class="text-center text-white mb-4">PRENOM</h4>
                    <h4 class="text-center text-white mb-4">PSEUDO</h4>
                    <h4 class="text-center text-white mb-4">EMAIL</h4>
                    <h4 class="text-center text-white m-4">DATE DE NAISSANCE</h4>
                    <h4 class="text-center text-white mb-4">NUMREO DE TELEPHONE</h4>
                <?php } ?>
                <div class="container">
                    <div class="text-center pt-2">
                        <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalInfoProfil">Modifier vos informations</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php }

function vosSujets($arraySujet, $arrayReponse)
{ ?>
    <div class="col-sm-12 col-md-12 col-lg-12 text-center text-white">
        <h2 class=" mt-5">Vos sujets</h2>
        <div class="row justify-content-center">
            <?php if (!empty($arraySujet)) {
            ?>
                <table class="table table-hover ml-3 mt-2 event-table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="align-middle event-question">Questions sur la thématique</th>
                            <th class="align-middle event-thematique">Thématique</th>
                            <th class="align-middle event-reponse">Réponses</th>
                            <th class="align-middle event-auteur">Auteur</th>
                            <th class="align-middle event-date">Date d'ajout</th>
                            <th class="align-middle event-acceder">Accéder à la discussion</th>
                        </tr>
                    </thead>
                    <?php foreach (array_slice($arraySujet, 0, 5) as $value) { ?>
                        <tbody class="text-white">
                            <tr>
                                <td class="align-middle" data-label="Questions sur la thématique" scope="row"><?php echo $value->getQuestionSujet(); ?></td>
                                <td class="align-middle" data-label="Thématique" scope="row"><?php echo $value->getTypeSujetTh(); ?></td>
                                <td class="align-middle" data-label="Réponses">
                                    <?php
                                    $compt = 0;
                                    foreach ($arrayReponse[0] as $val) {
                                        if ($value->getIdSujetTh() == $val->getIdSuje()) {
                                            $compt++;
                                        }
                                    }
                                    echo $compt;
                                    ?>
                                </td>
                                <td class="align-middle" data-label="Auteur"><?php echo "florent"; ?>
                                </td>
                                <td class="align-middle" data-label="Date d'ajout" scope="row"><?php echo $value->getDateAjout()->format('d-m-Y'); ?></td>
                                <td class="align-middle" data-label="Accéder à la discussion">
                                    <button type="button" class="btn btn-danger rounded-pill ">
                                        <a href="../forum/forumcontrolleur.php?sujetforum=<?php echo $value->getIdSujetTh(); ?>" style="text-decoration: none;" class=" text-white">Discussion</a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            <?php
            } else { ?>
                <h3>Vous n'avez pas posté de sujet</h3>
                <div class="container pb-3">
                    <a href="../forum/forumcontrolleur.php"><button style="font-size: 25px" class="btn btn-warning rounded-pill text-white">Forum</button></a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }

function compteARebours()
{ ?>
    <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
        <div class="row">
            <div class="col-12 text-center text-white">
                <h2>Votre voyage commence dans</h2>
                <div class="row countDown" id="countDown">
                    <div>
                        <div id="countDays">
                        </div>
                        <strong>Days</strong>
                    </div>
                    <div>
                        <div id="countHours">
                        </div>
                        <strong>Hours</strong>
                    </div>
                    <div>
                        <div id="countMinutes">
                        </div>
                        <strong>Minutes</strong>
                    </div>
                    <div>
                        <div id="countSeconds">
                        </div>
                        <strong>Seconds</strong>
                    </div>
                </div>
                <script src="../../view/profil/js.js"></script>
            </div>
        </div>
    </div>
<?php }

function banniere($banniereProfil)
{ ?>
    <?php
    if (empty($banniereProfil)) {
        echo '<img src="../../view/profil/banniereProfil/voyagez.jpg" class="img-fluid shadow-lg banniere_profil">';
    } else {
        echo '<img src="../../view/profil/banniereProfil/' . $banniereProfil[0]["NomFichier"] . '" class="img-fluid shadow-lg banniere_profil">';
    }
    ?>
    <div class="container">
        <div class="text-center pt-2">
            <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalBanniere">Modifier la bannière</div>
        </div>
    </div>
<?php }

function popupFormImageProfil()
{ ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container p-4">
                <h2 class="modal-title text-white mb-3">Changer l'image du profil</h2>
                <div class="text-white">
                    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_telechargement_profil_image") {
                        echo "Erreur lors du téléchargement, Veuillez réessayait plus tard.";
                    } elseif (isset($_GET["action"]) && $_GET["action"] == "erreur_type_image_profil") {
                        echo "Le type de votre image n'est pas autorisé.";
                    } ?>
                </div>
                <form action="profilControleur.php?action=modifImageProfil" method="post" enctype="multipart/form-data" class="form-container">
                    <div class="form-group">
                        <input type="file" name="file" required class="text-white"><br>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_telechargement_profil_image" || isset($_GET["action"]) && $_GET["action"] == "erreur_type_image_profil") { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modalProfil').modal('show');
            });
        </script>
    <?php
    } ?>
<?php }

function popupFormBanniereProfil()
{ ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalBanniere" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container p-4">
                <h2 class="modal-title text-white mb-3">Changer la banniere</h2>
                <div class="text-white">
                    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_telechargement_banniere_image") {
                        echo "Erreur lors du téléchargement, Veuillez réessayait plus tard.";
                    } elseif (isset($_GET["action"]) && $_GET["action"] == "erreur_type_image_banniere") {
                        echo "Le type de votre image n'est pas autorisé.";
                    } ?>
                </div>
                <form action="profilControleur.php?action=modifBanniereProfil" method="post" enctype="multipart/form-data" class="form-container">
                    <div class="form-group">
                        <input type="file" name="file" required class="text-white"><br>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_telechargement_banniere_image" || isset($_GET["action"]) && $_GET["action"] == "erreur_type_image_banniere") { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modalBanniere').modal('show');
            });
        </script>
    <?php
    } ?>
<?php }

function popupErreur($erreur)
{ ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalErreur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container p-4 text-white">
                <h2 class="modal-title mb-3">Erreur</h2>
                <p>Il y a eu un problème technique.<br>Code erreur : <?php echo $erreur; ?><br> Veuillez réessayer ultérieurement.</p>
                <div>
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($erreur)) { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('.xdebug-error').hide();
                $('#modalErreur').modal('show');
            });
        </script>
    <?php }
}

function popupInfoProfil($dataUtilisateur)
{ ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalInfoProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container text-white p-4">
                <h2 class="modal-title text-white mb-3">Modifier mes informations</h2>
                <form action="profilControleur.php?action=modifInfoProfil" method="post">
                    <label for="email">Adresse E-mail</label></br>
                    <input class="form-control" type="email" name="email" id="mail" pattern="^[a-zA-Z0-9_.-]{2,}@[a-zA-Z0-9_.-]{2,}\.[a-zA-Z]{2,}$" required value="<?php echo $dataUtilisateur->getEmail(); ?>"></br>
                    <label for="password">Mot de passe</label></br>
                    <input class="form-control" type="password" name="password" id="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[\w\W]{8,20}$" required></br>
                    <label for="text">Nom utilisateur</label></br>
                    <input class="form-control" type="text" name="pseudo" id="pseudo" pattern="^(?=.*[a-z])[A-Za-z\d_.-]{2,15}$" required value="<?php echo $dataUtilisateur->getPseudo(); ?>"></br>
                    <label for="civilité">Civilité</label></br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="civilité" id="monsieur" value="Monsieur" required>
                        <label class="civilité custom-control-label" for="monsieur">Monsieur</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" name="civilité" id="madame" value="Madame" required>
                        <label class="civilité custom-control-label" for="madame">Madame</label></br>
                    </div></br>
                    <label for="nom">Nom</label></br>
                    <input class="form-control" type="text" name="nom" id="nom" pattern="^[A-Za-z]{2,20}$" required value="<?php echo $dataUtilisateur->getNom(); ?>"></br>
                    <label for="prénom">Prénom</label></br>
                    <input class="form-control" type="text" name="prénom" id="prénom" pattern="^[A-Za-z]{2,20}$" required value="<?php echo $dataUtilisateur->getPrenom(); ?>"></br>
                    <label for="date_de_naissance">Date de naissance</label></br>
                    <input class="form-control" type="date" name="date" id="date" required value="<?php echo $dataUtilisateur->getDateNaissance()->format("Y-m-d"); ?>"></br>
                    <label for="tel">Téléphone</label></br>
                    <input class="form-control" type="tel" name="téléphone" id="tel" pattern="^[\d+]{10,12}$" required value="<?php echo $dataUtilisateur->getNumTel(); ?>"></br>
                    <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                </form>
            </div>
        </div>
    </div>
<?php }
