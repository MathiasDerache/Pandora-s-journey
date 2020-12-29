<?php

require_once("../pages_anonces/travail.php");
require_once("../coucheService/AnnoncesService.php");


$annonces = (new AnnoncesService())->readService();

body();
for ($i=0; $i<count($annonces); $i++){
    if ($annonces[$i]->getTypeAnn() == 'travail'){
        card($annonces, $i);
    }
}
pagination();
footer();