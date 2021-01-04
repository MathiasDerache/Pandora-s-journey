<?php

function cardAnnonce($annonces, $i){ ?>
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 lignes">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top btn btn-info" alt="">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $annonces[$i]->getTitreAnn() ?></h5>
                            <p class="card-text"><?php echo $annonces[$i]->getDescAnn() ?></p>
                            <a href="annonce_controlleur.php?id=<?php echo $annonces[$i]->getIdAnn() ?>" class="btn btn-primary stretched-link">Consulter</a>
                            </div>
                        </div>
                </div>
<?php }