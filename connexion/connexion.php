<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

</head>

<body class="position-relative">
    <!-- ----------------------------------  navbar ---------------------------------> 
        <?php
            include("../Pandora_nav_footer/nav.php");
        ?>
    <!-- ----------------------------------  navbar ---------------------------------> 
    <!------------------------------- Formulaire de connexion ------------------------------------>

    <form action="#" method="post">
        <div class="connexion">

            <h4 class="titre">CONNEXION</h4>

            <label for="email">Adresse E-mail / Nom utilisateur</label></br>
            <input type="text" name="login" id="login" pattern="^[a-zA-Z0-9_.-]{2,}@[a-zA-Z0-9_.-]{2,}\.[a-zA-Z]{2,}$|^(?=.*[a-z])[A-Za-z\d_.-]{2,15}$" required></br>

            <label for="password">Mot de passe</label></br>
            <input type="password" name="password" id="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[\w\W]{8,20}$" required></br>

            <button type="submit">Connexion</button>
        </div>
    </form>

    <!------------------------------- FIN Formulaire de connexion ------------------------------------>

        <!-- ----------------------------------  FOOTER ---------------------------------> 
<footer>
    <?php
        include("../Pandora_nav_footer/footer.php");
    ?>
</footer>
     <!-- ----------------------------------  FIN_FOOTER ---------------------------------> 

    
</body>

</html>