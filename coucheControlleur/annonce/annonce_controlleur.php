<?php

require_once("../pages_anonces/annonce.php");
require_once("../coucheService/AnnoncesService.php");
require_once("../Pandora_nav_footer/nav.php");
require_once("../Pandora_nav_footer/footer.php");

$annonces = (new AnnoncesService())->readByIdService($_GET['id']);

navBar();
body();
for ($i=0; $i<count($annonces); $i++){
        annonce($annonces, $i);
}
footer();