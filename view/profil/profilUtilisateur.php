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

function boutonFlottant()
{ ?>
    <div class="col-ms-12 col-md-2 col-lg-2">
        <div class="position-fixed card-infos">

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
        </div>


    </div>
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
                        <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalInfoProfil">Modifier vos infromation</div>
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
                // krsort($arraySujet); 
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
                                        <a href="../../forumcontroleur.php?sujetforum=<?php echo $value->getIdSujetTh(); ?>" style="text-decoration: none;" class=" text-white">Discussion</a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            <?php
            } else { ?>
                <h3>Vous n'avez pas posté de sujet</h3>
            <?php } ?>
        </div>
    </div>
<?php }

function locationAchat()
{ ?>
    <div class="col-sm-6 col-md-6 col-lg-6 mt-5">
        <h2 class="text-center text-white">LOCATIONS / ACHATS</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../view/profil/images/voyagez.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../view/profil/images/voyagez.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../view/profil/images/voyagez.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<?php }

function compteARebours()
{ ?>
    <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
        <div class="row">
            <div class="col-12 text-center text-white">
                <h2>Votre voyage commence dans</h2>
                <div class="row countDown">
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
    <!-- <div class="col-sm-12 col-md-12 col-lg-12"> -->
    <?php
    if (empty($banniereProfil)) {
        echo '<img src="../../view/profil/banniereProfil/voyagez.jpg" class="img-fluid shadow-lg banniere_profil">';
    } else {
        echo '<img src="../../view/profil/banniereProfil/' . $banniereProfil[0]["NomFichier"] . '" class="img-fluid shadow-lg banniere_profil">';
    }
    ?>
    <div class="container">
        <div class="text-center pt-2">
            <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalBanniere">Modifier la banniere</div>
        </div>
    </div>
    <!-- </div> -->
<?php }

function popupFormImageProfil()
{ ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container p-4">
                <h2 class="modal-title text-white mb-3">Changer l'image du profil</h2>
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
<?php }

function popupFormBanniereProfil()
{ ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalBanniere" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container p-4">
                <h2 class="modal-title text-white mb-3">Changer la banniere</h2>
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
