<?php

function bodyAnnonces(){?>
    <body class="position-relative">
        <div class="container-fluid annonces">  
        <div>
            <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalAjoutAnnonce">Ajouter une annonce</div>
        </div>

        <div class="modal fade" id="modalAjoutAnnonce" tabindex="-1" role="dialog" aria-labelledby="modalAjoutAnnonce" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content ajoutAnnonce p-4">
                    <h2 class="modal-title text-white mb-3">Ajoutez une annonce</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="text-white" for="">Selectionnez un thème:</label>
                            <select class="form-control" name="" id="">
                                <option class="font-weight-bold" value="travail">Travail</option>
                                <option class="font-weight-bold" value="loisir">Loisir</option>
                                <option class="font-weight-bold" value="immobilier">Immobilier</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="titreAnnonce" class="text-white">Titre de l'annonce</label>
                            <textarea class="form-control" name="titreAnnonce" id="" cols="1" rows="1"></textarea>
                            <label for="descriptionAnnonce" class="text-white">Description de l'annonce</label>
                            <textarea class="form-control" name="descriptionAnnonce" id="" cols="1" rows="1"></textarea>
                            <label for="numeroContactAnnonce" class="text-white">Numéro de contact</label>
                            <input type="text" class="form-control" name="numeroContactAnnonce" id="" cols="1" rows="1"></input>
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-warning rounded-pill text-white">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <div class="row lignesN">
<?php }