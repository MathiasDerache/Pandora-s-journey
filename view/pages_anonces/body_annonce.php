<?php function bodyAnnonce($imageProfil, $annonce, $auteurAnnonce, $imageAnnonce)
{ ?>

    <body class="position-relative">
        <div class="container-fluid annonces">
            <div class="row content">
                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                    <div class="card cardinfos position-fixed ">
                        <div class="row">
                            <div class="col-sm-2 col-md-2 col-lg-4 col-xl-4">
                                <?php
                                if ($imageProfil == null) {
                                    echo '<img src="../../view/profil/imageProfil/exempleProfilImage.jpg" height="100" width="100" class="rounded-circle mx-auto d-block m-2 shadow-lg img_profil">';
                                } else {
                                    echo '<img src="../../view/profil/imageProfil/' . $imageProfil[0]["NomFichier"] . '" height="100" width="100" class="rounded-circle mx-auto d-block m-2 shadow-lg img_profil">';
                                }
                                ?>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                <h5><?php echo $auteurAnnonce ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="badge rounded-pill bg-primary col-sm-12 col-md-12 col-lg-12 col-xl-12">CONTACTER</br></br><?php echo $annonce->getnumContAnn() ?></div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-12  col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <?php
                                            if ($imageAnnonce == null) {
                                                echo '<img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="d-block w-100 img-fluid" alt="...">';
                                            } else {
                                                echo '<img src="../../view/profil/imageAnnonce/' . $imageAnnonce[0]["NomFichier"] . '" class="d-block w-100 img-fluid" alt="...">';
                                            }
                                            ?>
                                        </div>
                                        <!-- <div class="carousel-item">
                                            <img src="images/Logo_v2.png" class="d-block w-100 img-fluid" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/Logo_v5.png" class="d-block w-100 img-fluid" alt="...">
                                        </div> -->
                                    </div>
                                    <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a> -->
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title"><?php echo $annonce->getTitreAnn() ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="reste">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ann">
                                <h3><?php echo $annonce->getDescAnn() ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ann">
                                <p>
                                </p>
                            </div>
                        </div>
                    <?php }
