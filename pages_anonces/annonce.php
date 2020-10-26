<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Annonces</title>
</head>

<body class="position-relative">
    <!-- ----------------------------------  navbar ---------------------------------> 
        <?php
            include("../Pandora_nav_footer/nav.php");
        ?>
    <!-- ----------------------------------  navbar ---------------------------------> 

<div class="container-fluid annonces">
    <div class="row content">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2"> 
            <div class="card cardinfos position-fixed " >
                <div class="row">
                     <div class="col-sm-2 col-md-2 col-lg-4 col-xl-4">
                         <img src="https://img.icons8.com/color/48/000000/image.png" class="img-fluid rounded-circle" alt="Responsive image">
                     </div>
                     <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                         <h5>Nom de l'annonceur</h5>
                     </div>
                </div>
                <div class="row">
                     <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                         <h5>PRO</h5>
                     </div>
                     <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <p>N° siret: xxxxxxxxxxx</p>
                    </div>
                </div>
                <div class="row">

                 </div>
                <div class="row">
                    <div class="container">
                        <button type="button" class="btn btn-primary col-sm-12 col-md-12 col-lg-12 col-xl-12">CONACTER/POSTULER</button>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <button type="button" class="btn btn-dark col-sm-12 col-md-12 col-lg-12 col-xl-12">voir le numéro</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- ----------------------------------  corps de l'annonce ---------------------------------> 

        <!-- ----------------------------------  card et carousselle ---------------------------------> 
        <div class="col-sm-12 col-md-12  col-lg-9 col-xl-9">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="d-block w-100 img-fluid" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="images/Logo_v2.png" class="d-block w-100 img-fluid" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="images/Logo_v5.png" class="d-block w-100 img-fluid" alt="...">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        <div class="card-body">
                          <h1 class="card-title">Titre de l'annonce</h1>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
            </div>
<!-- ----------------------------------  card et carousselle ---------------------------------> 

            <div class="reste">
                <div class="row">
                    <!-- ----------------------------------  critères annonce ---------------------------------> 
                                           <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h3>Critères:</h3>
                                           </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ann">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                       <div class="row">
                                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                            <img src="images/icons8-contrat-de-travail-100.png" alt="contrat" class="img-fluid">
                                                        </div>
                                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                            <h5>Type de contrat:</h5>
                                                            <p>Infos contrat</p>
                                                        </div>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ann">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                   <div class="row">
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        <img src="images/icons8-carte-64.png" alt="contrat" class="img-fluid">
                                                    </div>
                                                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <h5>secteur d'activité:</h5>
                                                        <p>Infos type de métier</p>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ann">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        <img src="images/icons8-travail-100.png" alt="contrat" class="img-fluid">
                                                    </div>
                                                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <h5>Fonction:</h5>
                                                        <p>intitulé</p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ann">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                       <div class="row">
                                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                            <img src="images/icons8-travail-64.png" alt="contrat" class="img-fluid">
                                                        </div>
                                                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                            <h5>Expériences:</h5>
                                                            <p>infos expériences demandées</p>
                                                        </div>
                                                       </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ann">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                   <div class="row">
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                                        <img src="images/icons8-signet-64.png" alt="contrat" class="img-fluid">
                                                    </div>
                                                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <h5>Niveau études:</h5>
                                                        <p>Diplômes</p>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ann">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                        <img src="images/icons8-temps-100.png" alt="contrat" class="img-fluid">
                                                    </div>
                                                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                        <h5>horaires Travails:</h5>
                                                        <p>Temps</p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                        <div class="row">
                                        <!-- ----------------------------------  description ---------------------------------> 
                                                               <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ann">
                                                                    <h3>description:</h3>
                                                               </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ann">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ann">
                                                                <h3>Annonces pouvant vous intéresser:</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 ann">
                                                                <div class="card" style="width: 18rem;">
                                                                    <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top" alt="...">
                                                                    <div class="card-body">
                                                                      <h5 class="card-title">Card title</h5>
                                                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                                                    </div>
                                                                  </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 ann">
                                                                <div class="card" style="width: 18rem;">
                                                                    <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top" alt="...">
                                                                    <div class="card-body">
                                                                      <h5 class="card-title">Card title</h5>
                                                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                                                    </div>
                                                                  </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 ann">
                                                                <div class="card" style="width: 18rem;">
                                                                    <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top" alt="...">
                                                                    <div class="card-body">
                                                                      <h5 class="card-title">Card title</h5>
                                                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                                                    </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                    </div>
        </div>
    </div>                  

    <!-- ----------------------------------  corps de l'annonce ---------------------------------> 

   
    <!-- ----------------------------------  card infos ---------------------------------> 

                   
    </div>
</div>
    <!-- ----------------------------------  card infos ---------------------------------> 

        <!-- ----------------------------------  FOOTER ---------------------------------> 
        <footer>
    <?php
        include("../Pandora_nav_footer/footer.php");
    ?>
</footer>
     <!-- ----------------------------------  FIN_FOOTER ---------------------------------> 
</body>
</html>