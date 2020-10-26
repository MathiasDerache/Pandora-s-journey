<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

</head>

<body class="position-relative">
    <!-- ----------------------------------  navbar ---------------------------------> 
        <?php
            include("../Pandora_nav_footer/nav.html");
        ?>
    <!-- ----------------------------------  navbar ---------------------------------> 


    <!------------------------------- Formulaire d'inscription ------------------------------------>

    <form action="#" method="post">
        <div class="inscription">

            <h4 class="titre">INSCRIPTION</h4>

            <label for="email">Adresse E-mail</label></br>
            <input type="email" name="email" id="mail" pattern="^[a-zA-Z0-9_.-]{2,}@[a-zA-Z0-9_.-]{2,}\.[a-zA-Z]{2,}$" required></br>

            <label for="password">Mot de passe</label></br>
            <input type="password" name="password" id="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[\w\W]{8,20}$" required></br>

            <label for="text">Nom utilisateur</label></br>
            <input type="text" name="user_name" id="user"  pattern="^(?=.*[a-z])[A-Za-z\d_.-]{2,15}$"required></br>

            <label for="civilité">Civilité</label></br>

            <input type="radio" name="civilité" id="monsieur" value="Monsieur" required>
            <label class="civilité" for="monsieur">Monsieur</label>

            
            <input type="radio" name="civilité" id="madame" value="Madame" required>
            <label class="civilité" for="madame">Madame</label></br>
            

            <label for="nom">Nom</label></br>
            <input type="text" name="nom" id="nom" pattern="^[A-Za-z]{2,20}$" required></br>

            <label for="prénom">Prénom</label></br>
            <input type="text" name="prénom" id="prénom" pattern="^[A-Za-z]{2,20}$" required></br>

            <label for="date_de_naissance">Date de naissance</label></br>
            <input type="date" name="date" id="date" required></br>

            <label for="tel">Téléphone</label></br>
            <input type="tel" name="téléphone" id="tel" pattern="^[\d+]{10,12}$" required></br>

            
            <button type="submit">Valider</button>
        </div>
    </form>

    <!------------------------------- FIN Formulaire d'inscription ------------------------------------>

        <!-- ----------------------------------  FOOTER ---------------------------------> 
        <footer>
    <?php
        include("../Pandora_nav_footer/footer.html");
    ?>
</footer>
     <!-- ----------------------------------  FIN_FOOTER ---------------------------------> 

    
</body>

</html>