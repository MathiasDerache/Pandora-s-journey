<?php

require_once("../pages_anonces/immobilier.php");
require_once("../coucheService/AnnoncesService.php");
require_once("../Pandora_nav_footer/nav.php");
require_once("../Pandora_nav_footer/footer.php");


$annonces = (new AnnoncesService())->readService();

navBar();
body();
for ($i=0; $i<count($annonces); $i++){
    if ($annonces[$i]->getTypeAnn() == 'immobilier'){
        card($annonces, $i);
    }
}
pagination();
footer();

