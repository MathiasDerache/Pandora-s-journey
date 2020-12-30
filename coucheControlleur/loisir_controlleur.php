<?php

require_once("../pages_anonces/loisirs.php");
require_once("../coucheService/AnnoncesService.php");
require_once("../Pandora_nav_footer/nav.php");
require_once("../Pandora_nav_footer/footer.php");

$annonces = (new AnnoncesService())->readService();

navBar();
body();
for ($i=0; $i<count($annonces); $i++){
    if ($annonces[$i]->getTypeAnn() == 'loisir'){
        card($annonces, $i);
    }
}
pagination();
footer();

