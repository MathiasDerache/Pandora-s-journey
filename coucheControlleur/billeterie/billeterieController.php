<?php
session_start();

include_once("../../Pandora_nav_footer/nav.php");
include_once("../../Pandora_nav_footer/footer.php");
include_once("../../view/billeterie/index.php");

head();
navBar();
etapes();
complementaire();
formulaireVol();
select();
suiteFormulaireVol();
footer();
?>