<?php

function modalAjoutAnnonce($typeAnnonce)
{ ?>
    <div class="modal fade" id="modalAjoutAnnonce" tabindex="-1" role="dialog" aria-labelledby="modalAjoutAnnonce" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ajoutAnnonce p-4">
                <h2 class="modal-title text-white mb-3">Ajoutez une annonce</h2>
                <form action="liste_annonces_controleur.php?type=annonces_<?php echo $typeAnnonce ?>&action=ajout_annonce" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="text-white" for="">Selectionnez un thème:</label>
                        <select class="form-control" name="themeAnnonce" id="themeAnnonce">
                            <option class="font-weight-bold" value="travail">Travail</option>
                            <option class="font-weight-bold" value="loisir">Loisir</option>
                            <option class="font-weight-bold" value="immobilier">Immobilier</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="titreAnnonce" class="text-white">Titre de l'annonce</label><br>
                        <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_titre_annonce_add") {
                            echo "<p class='text-danger'>Le titre de l'annonce est déjà utilisé.</p>";
                        } ?>
                        <textarea class="form-control" name="titreAnnonce" id="titreAnnonce" cols="1" rows="1" required></textarea>
                        <label for="descriptionAnnonce" class="text-white">Description de l'annonce</label>
                        <textarea class="form-control" name="descriptionAnnonce" id="descriptionAnnonce" cols="1" rows="1"></textarea>
                        <label for="imageAnnonce" class="text-white">Image de l'annonce</label>
                        <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_image_annonce_add") {
                            echo "<p class='text-danger'>Problème lors du téléchargement. type image autoriser (Png, Jpg, gif, Jpeg).</p>";
                        } ?>
                        <input type="file" name="imageAnnonce" id="imageAnnonce" cols="1" rows="1" class="text-white">
                        <label for="numeroContactAnnonce" class="text-white">Numéro de contact</label>
                        <input type="text" class="form-control" name="numeroContactAnnonce" id="numeroContactAnnonce" cols="1" rows="1" required></input>
                        <label for="numeroAdresseAnnonce" class="text-white">Numéro d'adresse</label>
                        <input type="text" class="form-control" name="numeroAdresseAnnonce" id="numeroAdresseAnnonce" cols="1" rows="1" required></input>
                        <label for="rueAdresseAnnonce" class="text-white">Rue</label>
                        <input type="text" class="form-control" name="rueAdresseAnnonce" id="rueAdresseAnnonce" cols="1" rows="1" required></input>
                        <label for="codePostalAnnonce" class="text-white">Code Postal</label>
                        <input type="text" class="form-control" name="codePostalAnnonce" id="codePostalAnnonce" cols="1" rows="1" required></input>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_titre_annonce_add" || isset($_GET["action"]) && $_GET["action"] == "erreur_image_annonce_add") { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modalAjoutAnnonce').modal('show');
            });
        </script>
    <?php }
}

function modalModificationAnnonce($typeAnnonce, $annonces)
{ ?>
    <?php foreach ($annonces as $annonce) { ?>
        <div class="modal fade" id="modalModificationAnnonce" tabindex="-1" role="dialog" aria-labelledby="modalModificationAnnonce" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content ajoutAnnonce p-4">
                    <h2 class="modal-title text-white mb-3">Modifiez une annonce</h2>
                    <!-- <form action="liste_annonces_controleur.php?type=annonces_<?php echo $typeAnnonce ?>&action=update&id=<?php echo $annonce->getIdAnn() ?>" method="POST" enctype="multipart/form-data"> -->
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="text-white" for="">Selectionnez un thème:</label>
                            <select class="form-control" name="themeAnnonce" id="themeAnnonce">
                                <option class="font-weight-bold" value="travail">Travail</option>
                                <option class="font-weight-bold" value="loisir">Loisir</option>
                                <option class="font-weight-bold" value="immobilier">Immobilier</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="titreAnnonce" class="text-white">Titre de l'annonce</label><br>
                            <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_titre_annonce_update") {
                                echo "Le titre de l'annonce est déjà utilisé.";
                            } ?>
                            <textarea class="form-control" name="titreAnnonce" id="titreAnnonce" cols="1" rows="1" required></textarea>
                            <label for="descriptionAnnonce" class="text-white">Description de l'annonce</label>
                            <textarea class="form-control" name="descriptionAnnonce" id="descriptionAnnonce" cols="1" rows="1"></textarea>
                            <label for="imageAnnonce" class="text-white">Image de l'annonce</label>
                            <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_image_annonce_update") {
                                echo "<p class='text-danger'>Problème lors du téléchargement. type image autoriser (Png, Jpg, gif, Jpeg).</p>";
                            } ?>
                            <input type="file" name="imageAnnonce" id="imageAnnonce" cols="1" rows="1" class="text-white">
                            <label for="numeroContactAnnonce" class="text-white">Numéro de contact</label>
                            <input type="text" class="form-control" name="numeroContactAnnonce" id="numeroContactAnnonce" cols="1" rows="1" required></input>
                            <label for="numeroAdresseAnnonce" class="text-white">Numéro d'adresse</label>
                            <input type="text" class="form-control" name="numeroAdresseAnnonce" id="numeroAdresseAnnonce" cols="1" rows="1" required></input>
                            <label for="rueAdresseAnnonce" class="text-white">Rue</label>
                            <input type="text" class="form-control" name="rueAdresseAnnonce" id="rueAdresseAnnonce" cols="1" rows="1" required></input>
                            <label for="codePostalAnnonce" class="text-white">Code Postal</label>
                            <input type="text" class="form-control" name="codePostalAnnonce" id="codePostalAnnonce" cols="1" rows="1" required></input>
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if (isset($_GET["action"]) && $_GET["action"] == "erreur_titre_annonce_update" || isset($_GET["action"]) && $_GET["action"] == "erreur_image_annonce_update") { ?>
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#modalModificationAnnonce').modal('show');
                });
            </script>
    <?php }
    }   ?>
<?php }
