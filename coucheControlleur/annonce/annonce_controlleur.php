<?php
session_start();
require_once("../../Pandora_nav_footer/nav.php");
require_once("../../Pandora_nav_footer/footer.php");
require_once("../../view/pages_anonces/head_annonce.php");
require_once("../../view/pages_anonces/body_annonce.php");
require_once("../../view/pages_anonces/card_annonce_interet.php");
require_once("../../coucheService/AnnoncesService.php");
require_once("../../coucheService/UtilisateurService.php");
require_once("../../coucheService/ImageService.php");

$annonce = (new AnnoncesService())->readByIdService($_GET['id']);

if (!empty($_GET)) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
                $titleAnnonce = $annonce->getTitreAnn();
        }
}

$arrayImage = (new ImageService())->readService();
if (!empty($arrayImage)) {
        foreach ($arrayImage as $value) {
                $nomFichierProfil = strstr($value->getNomFichier(), '.', true);
                if ($nomFichierProfil === "profil_Id" . $annonce->getIdUti()) {
                        $nomFichierProfil = $value->getNomFichier();
                        $imageProfil = (new ImageService())->searchImageProfilService($nomFichierProfil);
                        break;
                } else {
                        $imageProfil = null;
                }
        }
        foreach ($arrayImage as $value) {
                $nomFichierProfil = strstr($value->getNomFichier(), '.', true);
                if ($nomFichierProfil === "annonce_Id" . $annonce->getIdAnn()) {
                        $nomFichierProfil = $value->getNomFichier();
                        $imageAnnonce = (new ImageService())->searchImageProfilService($nomFichierProfil);
                        break;
                } else {
                        $imageAnnonce = null;
                }
        }
} else {
        $imageProfil = null;
        $imageAnnonce = null;
}

$auteurAnnonce = ((new UtilisateurService())->readByIdService($annonce->getIdUti()))->getPseudo();
$annoncesTravail = (new AnnoncesService())->readByTypeService('travail');
$annoncesLoisir = (new AnnoncesService())->readByTypeService('loisir');
$annoncesImmobilier = (new AnnoncesService())->readByTypeService('immobilier');



headAnnonce($titleAnnonce);
navBar();
if ($annonce->getTypeAnn() == 'immobilier') {
        bodyAnnonce($imageProfil, $annonce, $auteurAnnonce, $imageAnnonce);
        cardAnnonceInteret($annoncesTravail, $annoncesLoisir);
} elseif ($annonce->getTypeAnn() == 'travail') {
        bodyAnnonce($imageProfil, $annonce, $auteurAnnonce, $imageAnnonce);
        cardAnnonceInteret($annoncesImmobilier, $annoncesLoisir);
} elseif ($annonce->getTypeAnn() == 'loisir') {
        bodyAnnonce($imageProfil, $annonce, $auteurAnnonce, $imageAnnonce);
        cardAnnonceInteret($annoncesTravail, $annoncesImmobilier);
}
footer();
?><script src="app.js" type="text/javascript"></script><?php
