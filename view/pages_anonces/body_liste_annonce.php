<?php

function bodyListeAnnonces()
{ ?>

    <body class="position-relative">
        <div class="container-fluid annonces">
            <div>
                <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalAjoutAnnonce">Ajouter une annonce</div>
            </div>
            <div class="container filtre">
                <div class="row">
                    <input id="titre" type="text" placeholder="Titre de l'annonce">
                    <input id="description" type="text" placeholder="description">
                    <select name="anciennete" id="anciennete">
                        <option value="recent">Du plus récent au plus ancien</option>
                        <option value="ancien">Du plus ancient au plus récent</option>
                    </select>
                </div>
            </div>
            <div class="row lignesN">

            <?php }
