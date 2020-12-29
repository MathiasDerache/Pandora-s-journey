<?php

require_once("../pages_anonces/immobilier.php");
require_once("../coucheService/AnnoncesService.php");


$annonces = (new AnnoncesService())->readService();

body();
for ($i=0; $i<count($annonces); $i++){
    if ($annonces[$i]->getTypeAnn() == 'immobilier'){
        card($annonces, $i);
    }
}
pagination();
footer();

