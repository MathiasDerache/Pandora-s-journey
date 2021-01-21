<?php

function bodyListeAnnonces()
{ ?>

    <body class="position-relative">
        <div class="container-fluid annonces">
            <?php
            if (isset($_SESSION) && !empty($_SESSION)) { ?>
                <div>
                    <div type="button" class="btn btn-warning rounded-pill text-white" data-toggle="modal" data-target="#modalAjoutAnnonce">Ajouter une annonce</div>
                </div>
            <?php }
            ?>
            <div class="row lignesN">

            <?php }
