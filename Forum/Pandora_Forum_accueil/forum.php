<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Forum</title>
</head>

<body class="position-relative">
    <!-- ----------------------------------  navbar --------------------------------->
    <?php
    include("../../Pandora_nav_footer/nav.php");
    ?>
    <!-- ----------------------------------  navbar --------------------------------->

    <div class="container-fluid">
        <div class="row">
            <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12 titre_forum">
                <h1>Forum</h1>
                <hr>
            </div>
        </div>

        <div class="row" style="text-align: center;">
            <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-6 forum">
                <a href="/../pandora/furumcontroleur.php?sujet=annonces">
                    <h2>Annonces</h2>
                </a>
                <p>Les annonces officielles de Pandora's Journey</p>
            </div>
            <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-6 forum">
                <a href="../forum_sujet/forum_discussions_generales.php">
                    <h2>Discussions Générales</h2>
                </a>
                <p>Les discussions diverses en relation avec nos services</p>
            </div>
        </div>

        <div class="row" style="text-align: center;">
            <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-6 forum">
                <a href="../forum_sujet/forum_immobilier.php">
                    <h2>Immobilier</h2>
                </a>
                <p>Une question concernant les biens immobilier sur Pandora ? C'est ici ! </p>
            </div>
            <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-6 forum">
                <a href="../forum_sujet/forum_travail.php">
                    <h2>Travail</h2>
                </a>
                <p>Les questions concernant le travail sur Pandora sont ici !</p>
            </div>
        </div>

        <div class="row" style="text-align: center;">
            <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-6 forum">
                <a href="../forum_sujet/forum_loisirs.php">
                    <h2>Loisirs</h2>
                </a>
                <p>Inquiet sur les loisirs disponible sur Pandora ? Posez vos questions !</p>
            </div>
            <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-6 forum">
                <a href="../forum_sujet/forum_aide_support.php">
                    <h2>Aide & Support</h2>
                </a>
                <p>Un problème ? Quelqu'un a sûrement la solution !</p>
            </div>
        </div>
    </div>



    <!-- ----------------------------------  FOOTER --------------------------------->
    <footer>
        <?php
        include("../../Pandora_nav_footer/footer.php");
        ?>
    </footer>
    <!-- ----------------------------------  FIN_FOOTER --------------------------------->
</body>

</html>