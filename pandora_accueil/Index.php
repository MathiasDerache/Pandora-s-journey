<?php
    include("../Pandora_nav_footer/nav.php");
    include("../Pandora_nav_footer/footer.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">  
    <title>Accueil</title>
</head>

<body>
    <!-- ----------------------------------  navbar ---------------------------------> 

    <div class="navbarVideo">
            <ul>
                <li class="item"><a href="../coucheControlleur/liste_annonces_controleur.php?action=annonces_immobilier">Immobilier</a></li>
                <li class="item"><a href="../coucheControlleur/liste_annonces_controleur.php?action=annonces_travail.php">Travail</a></li>
                <li class="item"><a href="../coucheControlleur/liste_annonces_controleur.php?action=annonces_loisir">Loisir</a></li>
                <li class="item"><a href="../page_contact/contact.php">Contacts</a></li>
                <li class="item"><a href="#">Billet</a></li>
            </ul>
    </div>
    <div class="video">
        <video autoplay loop muted class="embed-responsive embed-responsive-16by9">
            <source src="video/Project 2.mkv">
        </video>
            <div class="scroll-down">
            </div>
    </div>

    <!-- ----------------------------------- Video principal ---------------------------  -->
    <div class="body displayNone">
        <?php navBar() ?>
        <div class="scroll-up">
        </div>
        <div class="container-menu">
            <div class="btn-menu">
                <div class="ligne"></div>
            </div>

            <div class="blob blob-1">
                <a href="../connexion/connexion.php" title="Connexion"><img src="images/user.svg" alt="icone" class="icone"></a>
            </div>
            <div class="blob blob-2">
                <a href="../page_inscription/formulaire" title="Inscription"><img src="images/inscription.svg" alt="icone" class="icone"></a>
            </div>
        </div>
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
            <?php footer() ?>
        </div>


    <!-- ----------------------------------  FOOTER ---------------------------------> 
     <!-- ----------------------------------  FIN_FOOTER ---------------------------------> 
</body>
<script src="app.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>