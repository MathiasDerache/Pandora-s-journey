<?php
require_once("../../coucheService/ImageService.php");

function cardAnnonce($typeAnnonce, $annonces)
{
    $imageService = new ImageService();

    for ($i = 0; $i < count($annonces); $i++) { ?>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 lignes">
            <div class="card" style="width: 25rem;">
                <?php
                // Recherche image profil de l'utilisateur
                $arrayImage = $imageService->readService();
                if (!empty($arrayImage)) {
                    foreach ($arrayImage as $value) {
                        $nomFichierProfil = strstr($value->getNomFichier(), '.', true);
                        if ($nomFichierProfil === "annonce_Id" . $annonces[$i]->getIdAnn()) {
                            $nomFichierProfil = $value->getNomFichier();
                            $imageProfil = $imageService->searchImageProfilService($nomFichierProfil);
                            break;
                        } else {
                            $imageProfil = null;
                        }
                    }
                } else {
                    $imageProfil = null;
                }

                if (empty($imageProfil)) {
                    echo '<img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top btn btn-info imgAnnonce" alt="">';
                } else {
                    echo '<img src="../../view/profil/imageAnnonce/' . $imageProfil[0]["NomFichier"] . '" class="card-img-top btn btn-info imgAnnonce" alt="">';
                }
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $annonces[$i]->getTitreAnn() ?></h5>
                    <p class="card-text"><?php echo $annonces[$i]->getDescAnn() ?></p>
                    <a href="annonce_controlleur.php?id=<?php echo $annonces[$i]->getIdAnn() ?>"><button class="btn btn-primary">Consulter</button></a>
                    <?php
                    $_POST["idAnnonce"] = $annonces[$i]->getIdAnn();
                    if (isset($_SESSION) && !empty($_SESSION) && $_SESSION["id"] == $annonces[$i]->getIdUti()) { ?>
                        <a href="liste_annonces_controleur.php?type=annonces_<?php echo $typeAnnonce ?>&action=delete&id=<?php echo $annonces[$i]->getIdAnn() ?>"><button class="btn btn-primary">Supprimer</button></a>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalModificationAnnonce">Modifier</button>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php }
