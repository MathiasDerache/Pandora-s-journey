<?php
require_once __DIR__ . "/../../Pandora_nav_footer/nav.php";
require_once __DIR__ . "/../../Pandora_nav_footer/footer.php";

function html($erreur)
{
    htmlHeader();
    htmlbody($erreur);
}

function htmlHeader()
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../view/contact/style.css">
    </head>
<?php }

function htmlBody($erreur)
{ ?>

    <body class="position-relative">
        <!-- ----------------------------------  navbar --------------------------------->
        <?php
        navBar();
        ?>
        <!-- ----------------------------------  navbar --------------------------------->

        <!-- Information contact -->
        <?php
        infoContact();
        ?>
        <!-- Fin information contact -->

        <!-- Formaulaire de contact -->
        <?php
        formulaireContact();
        ?>
        <!-- Fin formulaire de contact -->

        <!-- Modal -->
        <?php
        modalConfirmation();
        popupErreur($erreur);
        ?>
        <!-- Fin modal -->

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

function infoContact()
{ ?>
    <div class="info">
        <h3>Nos conseillers sont à votre écoute</h3><br>
        <p>Ouvert du lundi au vendredi de 10h à 18h <br>
            06 XX XX XX XX</p>
    </div>
<?php }

function formulaireContact()
{ ?>
    <form action="contactControlleur.php?action=envoieMail" method="post">
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
                <label for="condition_contact">En Soumettant ce formulaire, j'accepte que les données saisies soient utilisées pour me recontacter.</label><br>
            </div>
            <p>*Champs Obligatoire</p><br>
            <div class="submit">
                <input type="submit" value="Envoyer">
            </div>
        </div>
    </form>
<?php }

function modalConfirmation()
{ ?>
    <div class="modal fade text-center" id="modalConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content form-container p-4 text-white">
                <h2 class="modal-title mb-3">MAIL ENVOYÉ</h2>
                <p>Vous allez être redirigés vers la page d'accueil dans quelques secondes.</p>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET["action"]) && $_GET["action"] == "confirmation") {
    ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modalConfirmation').modal('show');
            });
        </script>
    <?php } ?>
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
?>