<?php

function paginationAnnonce($nombreDePages, $pageActuelle, $typeAnnonce)
{ ?>
    <div class="container-fluid lignes">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mx-auto">
                        <ul class="pagination">
                            <li>
                            <?php
                            for ($i = 1; $i <= $nombreDePages; $i++)
                            {
                                if ($i == $pageActuelle)
                                {
                                    echo '<span class="badge bg-warning rounded-pill">'.$i.'</span>';
                                } else
                                {
                                    echo '<a href="liste_annonces_controleur.php?type='  .  $typeAnnonce  .  '&page=' . $i . '"><span class="badge bg-info rounded-pill">' . $i . '</span></a> ';
                                }
                            }
                            echo '</p>';
                            ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }