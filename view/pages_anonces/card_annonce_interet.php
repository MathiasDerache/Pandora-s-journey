<?php

function cardAnnonceInteret($annonces1, $annonces2)
{ ?>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ann">
            <h3>Annonces pouvant vous intéresser:</h3>
        </div>
    </div>
    <div class="row">
        <?php if ($annonces1) { ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 ann">
                <div class="card" style="width: 18rem;">
                    <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $annonces1[0]->getTitreAnn() ?></h5>
                        <p class="card-text"><?php echo $annonces1[0]->getDescAnn() ?></p>
                        <a href="annonce_controlleur.php?id=<?php echo $annonces1[0]->getIdAnn() ?>" class="btn btn-primary">Consulter</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($annonces2) { ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 ann">
                <div class="card" style="width: 18rem;">
                    <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $annonces2[0]->getTitreAnn() ?></h5>
                        <p class="card-text"><?php echo $annonces2[0]->getDescAnn() ?></p>
                        <a href="annonce_controlleur.php?id=<?php echo $annonces2[0]->getIdAnn() ?>" class="btn btn-primary">Consulter</a>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
<?php } ?>
</div>
</div>
<?php }
