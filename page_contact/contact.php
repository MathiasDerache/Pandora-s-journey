<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
</head>

<body class="position-relative">
    <!-- ----------------------------------  navbar --------------------------------->
    <?php
    include("../Pandora_nav_footer/nav.php");
    ?>
    <!-- ----------------------------------  navbar --------------------------------->

    <!-- Information contact -->
    <div class="info">
        <h3>Nos conseillers sont à votre écoute</h3><br>
        <p>Ouvert du lundi au vendredi de 10h à 18h <br>
            06 XX XX XX XX</p>
    </div>
    <!-- Fin information contact -->

    <!-- Formaulaire de contact -->
    <form action="#" method="post">
        <div class="contact">
            <div class="radio">
                <input type="radio" name="civilité" id="madame" value="Madame" required>
                <label class="civilité" for="madame">Madame</label><br>
                <input type="radio" name="civilité" id="monsieur" value="Monsieur" required>
                <label class="civilité" for="monsieur">Monsieur</label>
            </div><br>
            <div class="nom_prenom">
                <input type="text" name="nom" id="nom_contact" pattern="^[A-Za-z]{2,20}$" placeholder="Nom*" required><br>
                <input type="text" name="prenom" id="prenom_contact" pattern="^[A-Za-z]{2,20}$" placeholder="Prenom*" required>
            </div><br>
            <div class="email_tel">
                <input type="email" name="email" id="mail" pattern="^[a-zA-Z0-9_.-]{2,}@[a-zA-Z0-9_.-]{2,}\.[a-zA-Z]{2,}$" placeholder="Adresse Email*" required><br>
                <input type="tel" name="téléphone" id="tel" pattern="^[\d+]{10,12}$" placeholder="Téléphone*" required>
            </div><br>
            <div class="message">
                <textarea name="message" id="message_contact" placeholder="Votre message*" rows="10" maxlength="2000"></textarea>
            </div>
            <div class="condition">
                <input type="checkbox" name="condition" id="condition_contact" required>
                <label for="condition">En Soumettant ce formulaire, j'accepte que les données saisies soient utilisées pour me recontacter.</label><br>
            </div>
            <p>*Champs Obligatoire</p><br>
            <div class="submit">
                <input type="submit" value="Envoyer">
            </div>
        </div>
    </form>
    <!-- Fin formulaire de contact -->

    <!-- ----------------------------------  FOOTER --------------------------------->
    <footer>
        <?php
        include("../Pandora_nav_footer/footer.php");
        ?>
    </footer>
    <!-- ----------------------------------  FIN_FOOTER --------------------------------->
</body>

</html>