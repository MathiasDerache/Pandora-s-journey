<?php

require_once("../pages_anonces/annonce.php");
require_once("../coucheService/AnnoncesService.php");

$annonces = (new AnnoncesService())->readByIdService($_GET['id']);

body();
for ($i=0; $i<count($annonces); $i++){
        annonce($annonces, $i);
}
footer();