<?php 

require_once("../../Pandora_nav_footer/nav.php");
require_once("../../Pandora_nav_footer/footer.php");
require_once("../../view/pages_anonces/head_annonce.php");
require_once("../../view/pages_anonces/body_annonce.php");
require_once("../../coucheService/AnnoncesService.php");
require_once("../../coucheService/UtilisateurService.php");

$annonce = (new AnnoncesService())->readByIdService($_GET['id']);

if (!empty($_GET)){
        if (isset($_GET['id']) && !empty($_GET['id'])){
                $titleAnnonce=$annonce->getTitreAnn();
        }
}

$auteurAnnonce=((new UtilisateurService())->readByIdService($annonce->getIdUti()))->getPseudo();
$annoncesTravail=(new AnnoncesService())->readByTypeService('travail');
$annoncesLoisir=(new AnnoncesService())->readByTypeService('loisir');
$annoncesImmobilier=(new AnnoncesService())->readByTypeService('immobilier');

headAnnonce($titleAnnonce);
navBar();
if ($annonce->getTypeAnn() == 'immobilier'){
        bodyAnnonce($annonce, $auteurAnnonce, $annoncesTravail, $annoncesLoisir);
}
elseif ($annonce->getTypeAnn() == 'travail'){
        bodyAnnonce($annonce, $auteurAnnonce, $annoncesImmobilier, $annoncesLoisir);
}
elseif ($annonce->getTypeAnn() == 'loisir'){
        bodyAnnonce($annonce, $auteurAnnonce, $annoncesTravail, $annoncesImmobilier);
}
footer();
?><script src="app.js" type="text/javascript"></script><?php

