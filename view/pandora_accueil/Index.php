<?php

function head()
{ ?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="jquery-fab-button/css/jquery-fab-button.css">
        <link rel="stylesheet" href="../../view/pandora_accueil/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
        <title>Accueil - Pandora's</title>
    </head>
<?php
}

function video()
{ ?>

    <body>
        <!-- ----------------------------------  VIDEO et NAV --------------------------------->
        <div class="main">
            <div class="row">
                <div class="navbarVideo">
                    <ul>
                        <li class="col-md-1 col-lg-2"><a href="../annonce/liste_annonces_controleur.php?type=annonces_immobilier">Immobilier</a></li>
                        <li class="col-md-1 col-lg-2"><a href="../annonce/liste_annonces_controleur.php?type=annonces_travail">Travail</a></li>
                        <li class="col-md-1 col-lg-2"><a href="../annonce/liste_annonces_controleur.php?type=annonces_loisir">Loisir</a></li>
                        <li class="col-md-1 col-lg-2"><a href="../forum/forumcontrolleur.php">Forum</a></li>
                        <li class="col-md-1 col-lg-2"><a href="../contact/contactControlleur.php">Contacts</a></li>
                        <li class="col-md-1 col-lg-2"><a href="../billeterie/billeterieController.php">Billet</a></li>
                    </ul>
                </div>
            </div>

            <div class="video">
                <video autoplay loop muted class="embed-responsive embed-responsive-16by9">
                    <source src="../../view/pandora_accueil/video/Project 2.mkv" type="video/mkv">
                    <source src="../../view/pandora_accueil/video/Project 2.webm" type="video/webm">
                </video>
                <!-- Scroll Down -->
                <div class="scroll-down">
                </div>
            </div>
        </div>
    <?php
}

function section1()
{ ?>
        <!-- ----------------------------------- BODY ---------------------------  -->
        <div class="body displayNone">
            <?php navBar() ?>

            <!-- Scroll Up -->
            <div class="scroll-up">
            </div>

            <!-- Button pour Utilisateur -->
            <div class="container-menu">
                <div class="btn-menu">
                    <div class="ligne"></div>
                </div>
                <?php
                if (isset($_SESSION) && !empty($_SESSION)) { ?>
                    <div class="blob blob-1 text-white">
                        <button><a href="../profil/profilControleur.php"><img src="../../view/pandora_accueil/images/user.svg" alt="icone" class="icone"></a></button>
                    </div>
                    <div class="blob blob-2">
                        <button><a href="../utilisateur/utilisateurControleur.php?action=deconnexion"><img src="../../view/pandora_accueil/images/deconnexion.svg" alt="icone" class="icone"></a></button>
                    </div>
                <?php } else { ?>
                    <div class="blob blob-1">
                        <button data-toggle="modal" data-target="#modalConnexion"><img src="../../view/pandora_accueil/images/user.svg" alt="icone" class="icone"></button>
                    </div>
                    <div class="blob blob-2">
                        <button data-toggle="modal" data-target="#modalInscription"><img src="../../view/pandora_accueil/images/inscription.svg" alt="icone" class="icone"></button>
                    </div>
                <?php }
                ?>
            </div>

            <!-- Section 1 -->
            <div id="section1">
                <div class="section1">
                    <div class="imagePresentation reveal-1">
                    </div>
                    <div class="titrePresentation reveal-2">
                        <h1>Voyagez</h1>
                    </div>
                    <div class="textPresentation reveal-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut numquam, nobis illum quam,
                            commodi dolor recusandae iusto deserunt provident dolorem porro quae maiores, earum sapiente
                            maxime repudiandae. Explicabo accusantium vero vel voluptatum recusandae laboriosam placeat ea
                            unde repellendus, at provident amet repellat, quo ipsam sint consectetur illo quasi natus esse!</p>
                    </div>
                </div>
            </div>
        <?php
    }

    function section2()
    { ?>
            <!-- Section 2 -->
            <div class="section2">
                <div class="imagePresentation2 reveal-1">
                </div>
                <div class="titrePresentation2 reveal-2">
                    <h1>Explorez</h1>
                </div>
                <div class="textPresentation2 reveal-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti id quisquam recusandae necessitatibus eos
                        placeat eligendi illo vero cum sed cumque nihil laborum similique in accusamus praesentium doloremque quasi,
                        aliquam dolorem quae minima. Et provident, tenetur eos nemo adipisci alias laboriosam possimus illo debitis
                        nesciunt animi, ut ullam cum iure omnis molestias culpa eveniet numquam commodi. Nam enim harum veniam, itaque
                        commodi adipisci necessitatibus ut sed voluptatem aliquam. Distinctio totam quis ad illum nihil numquam aperiam
                        minima eum, quibusdam maxime tenetur, molestiae sequi vero culpa.</p>
                </div>
            </div>
        <?php
    }

    function section3()
    { ?>
            <!-- Section 3 -->
            <div class="section1">
                <div class="imagePresentation3 reveal-1">
                </div>
                <div class="titrePresentation reveal-2">
                    <h1>Découvrez</h1>
                </div>
                <div class="textPresentation reveal-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eligendi expedita, commodi nihil at,
                        ea laborum consequatur harum earum placeat iste quo sit sequi assumenda. Illo voluptates provident ullam
                        recusandae corrupti adipisci qui officiis exercitationem fugiat atque, quasi iure maxime voluptatum commodi
                        minus molestias eius autem.</p>
                </div>
            </div>
        </div>
    </body>
<?php
    }

    function modalConnexion()
    { ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container text-white p-4">
                <h2 class="modal-title text-white mb-3">Connexion</h2>
                <form action="../utilisateur/utilisateurControleur.php?action=connexion" method="post">
                    <label for="email">Adresse E-mail</label></br>
                    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_email") {
                        echo "Email inconnu.";
                    } ?>
                    <input class="form-control" type="email" name="email" id="mail" pattern="^[a-zA-Z0-9_.-]{2,}@[a-zA-Z0-9_.-]{2,}\.[a-zA-Z]{2,}$" required></br>
                    <label for="password">Mot de passe</label></br>
                    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_mdp") {
                        echo "Mot de passe incorrect.";
                    } ?>
                    <input class="form-control" type="password" name="password" id="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[\w\W]{8,20}$" required></br>
                    <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_mdp" || isset($_GET["action"]) && $_GET["action"] == "erreur_email") { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modalConnexion').modal('show');
            });
        </script>
    <?php
        }
    }


    function modalInscription()
    { ?>
    <!-- Modal -->
    <div class="modal fade text-center" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container text-white p-4">
                <h2 class="modal-title text-white mb-3">Inscription</h2>
                <form action="../utilisateur/utilisateurControleur.php?action=inscription" method="post">
                    <label for="email">Adresse E-mail</label></br>
                    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_inscription_email") {
                        echo "Email deja utiliser.";
                    } ?>
                    <input class="form-control" type="email" name="email" id="mail" pattern="^[a-zA-Z0-9_.-]{2,}@[a-zA-Z0-9_.-]{2,}\.[a-zA-Z]{2,}$" required></br>
                    <label for="password">Mot de passe</label></br>
                    <input class="form-control" type="password" name="password" id="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[\w\W]{8,20}$" required></br>
                    <label for="text">Nom utilisateur</label></br>
                    <input class="form-control" type="text" name="pseudo" id="pseudo" pattern="^(?=.*[a-z])[A-Za-z\d_.-]{2,15}$" required></br>
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
                    <input class="form-control" type="text" name="nom" id="nom" pattern="^[A-Za-z]{2,20}$" required></br>
                    <label for="prénom">Prénom</label></br>
                    <input class="form-control" type="text" name="prénom" id="prénom" pattern="^[A-Za-z]{2,20}$" required></br>
                    <label for="date_de_naissance">Date de naissance</label></br>
                    <input class="form-control" type="date" name="date" id="date" required></br>
                    <label for="tel">Téléphone</label></br>
                    <input class="form-control" type="tel" name="téléphone" id="tel" pattern="^[\d+]{10,12}$" required></br>
                    <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                    <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../../view/pandora_accueil/app.js" type="text/javascript"></script>
    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_inscription_email") { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modalInscription').modal('show');
            });
        </script>
    <?php
        } ?>

    </html>
<?php
    }
