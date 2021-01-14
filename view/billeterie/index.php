<?php
    include("../../Pandora_nav_footer/nav.php");
    include("../../Pandora_nav_footer/footer.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet"> 
    <title>Billeterie - Pandora's Journey</title>
</head>
<body>
    <!-- ----------------------------------  NavBar ---------------------------------> 
    <?php navBar() ?>
    <!-- ----------------------------------  Corps  ---------------------------------> 
    
    <div class="container infoVol">
        <div class ="row">
            <div>
                <h1 class="col-12 h1Section">Départs, vols et vie sur Pandora</h1>
            </div>
            <div>
                <p class="col-12 sousTexte text-center">Tout savoir avant de partir !</p>
            </div>
        </div>

        <div class="row section1">
            <div>
                <p class =" para1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, iste quis dolore nulla, labore dolor ab vitae optio natus ipsum blanditiis placeat expedita nam minima nostrum, recusandae quasi nesciunt unde.
                Explicabo cum debitis reiciendis !<br>
                <br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, nam. Ratione fugit, qui perspiciatis numquam nostrum ea pariatur tempore repellat corporis dignissimos magnam? Ad, deleniti ipsa laudantium ipsum non vel.Numquam delectus earum impedit officia facere unde laborum laudantium dignissimos ipsum quaerat.</p>
            </div>
        </div>
    </div>
<div class="container Preparer">
    <div class="section-icon-container mx-auto mb-3">
        <div class="row justify-content-center">
            <img src="images/prepare.svg" class =" col-12 iconPrepare">
            <h3 class ="titreEtapes">Se Préparer</h3>
            <div class="separator"></div>
        </div>
    </div>
    <div class="container Etapes">
        <div class="row col-lg-12 col-md-12 align-items-center rowEtapes">
            <div class="preparation">
                <div class="col">
                    <img src="images/map.svg">
                    <h4>Comment s'y rendre ?</h4>
                    <p>Les Départs se font dans la capital de votre pays</p>
                    <p>Les horaires dépendent de votre pays</p>
                </div>

                <div class="col">
                    <img src="images/bagage.svg">
                    <h4>Assurance Voyage</h4>
                    <p>Pensez à prendre une assurance en cas d'annulation</p>
                    <p>Une assurance bagage peut aussi être envisagée !</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container Preparer">
    <div class="section-icon-container mx-auto mb-3">
        <div class="row justify-content-center">
            <img src="images/planet.svg" class =" col-12 iconPrepare">
            <h3 class ="titreEtapes">Sur place</h3>
            <div class="separator"></div>
        </div>
    </div>
    <div class="container Etapes">
        <div class="row col-lg-12 col-md-12 align-items-center rowEtapes">
            <div class="preparation">
                <div class="col">
                    <img src="images/languages.svg">
                    <h4>Langue offcielle</h4>
                    <p>La langue la plus parlé sur Pandora est l'anglais</p>
                    <p>Vous pouvez trouver des associations d'entre-aide parlant votre langue</p>
                </div>

                <div class="col">
                    <img src="images/sun.svg">
                    <h4>La météo sur Pandora</h4>
                    <p>Le climat est tropical, équivalent à des température Sud-Américaine</p>
                    <p>De part son climat tropical, les saisons des pluies sont à prévoir</p>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="container complementaire">
    <div class="textComplementaire">
        <h2>Informations complémentaire ?</h2>
        <p>Vous avez des questions ou besoin de plus d'infos ? rendez-vous sur le forum, c'est <a href="#">juste ici.</a><br>Envie de passer le pas et réserver votre vol ? c'est en dessous que ça ce passe !</p>
    </div>
</div>

    <!-- ----------------------------------  FOOTER ---------------------------------> 
    <?php footer() ?>
</body>
<script src="app.js" type="text/javascript"></script>
</html>