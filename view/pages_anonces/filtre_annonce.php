<?php

function filtreAnnonce()
{ ?>
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
<?php }
