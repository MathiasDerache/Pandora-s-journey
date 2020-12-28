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
    <link rel="stylesheet" href="jquery-fab-button/css/jquery-fab-button.css">
    <title>Page Profil</title>
</head>

<body>
    <!-- ----------------------------------  navbar --------------------------------->
    <?php
    include("../Pandora_nav_footer/nav.php");
    ?>
    <!-- ----------------------------------  navbar --------------------------------->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10 pt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 profilDetails">
                        <h1 class="text-center mt-5 profilTitre">PAGE PROFIL</h1>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <img src="images/voyagez.jpg" alt="" class="img-fluid shadow-lg">
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6 mt-5">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <h2 class="text-center text-white ">COMPTE A REBOURS:</h2>
                                            <img src="images/countdown-twitter.jpg" alt="" class="img-fluid shadow-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 mt-5">
                                    <h2 class="text-center text-white">LOCATIONS / ACHATS</h2>
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="images/voyagez.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="images/voyagez.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="images/voyagez.jpg" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-lg-10 mb-5 text-center text-white">
                                <h2 class=" mt-5">ANNONCES POUVANT VOUS CORRESPONDRE :</h2>
                                <div class="row lignesN justify-content-between ">
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 lignes mt-2">
                                        <div class="card" style="width: 18rem;">
                                            <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top btn btn-info" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">titre annonce</h5>
                                                <p class="card-text">contenu annonces</p>
                                                <a href="annonce.php" class="btn btn-primary stretched-link">consulter</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 lignes mt-2">
                                        <div class="card" style="width: 18rem;">
                                            <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top btn btn-info" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">titre annonce</h5>
                                                <p class="card-text">contenu annonces</p>
                                                <a href="annonce.php" class="btn btn-primary stretched-link">consulter</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 lignes mt-2">
                                        <div class="card" style="width: 18rem;">
                                            <img src="images/OIP.iKCOkz0Ud8Hk2532a5bvxgHaEE.jpg" class="card-img-top btn btn-info" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">titre annonce</h5>
                                                <p class="card-text">contenu annonces</p>
                                                <a href="annonce.php" class="btn btn-primary stretched-link">consulter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 pt-5 ">
                        <div class="card-dark col-12  mt-5 mb-3">
                            <div class="card-body">
                                <div class="mb-5">
                                    <img src="images/exempleProfilImage.jpg" alt="exemploeprofilImage" class="rounded-circle mx-auto d-block m-2 shadow-lg">
                                </div>
                                <h2 class="text-center text-white mb-4">NOM</h2>
                                <h4 class="text-center text-white mb-4">PRENOM</h4>
                                <h4 class="text-center text-white mb-4">ÂGE</h4>
                                <h4 class="text-center text-white mb-4">NATIONNALITE</h4>
                                <h4 class="text-center text-white m-4">METIER</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-ms-12 col-md-2 col-lg-2">
                <div class="position-fixed card-infos">

                    <ul class="bg-warning col-4 sideNotifs rounded rounded-pill p-1 mx-auto d-block" id="sideNotifs">
                        <li class="m-4"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-chat-left-text mx-auto d-block" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                </svg></a></li>
                        <li class="m-4"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-bell mx-auto d-block" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                </svg></a></li>
                        <li class="m-4"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-cart3 mx-auto d-block" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg></a></li>
                        <li class="m-4"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="100%" fill="currentColor" class="bi bi-gear-fill mx-auto d-block" viewBox="0 0 16 16">
                                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                </svg></a></li>
                    </ul>
                    <button type="button" class="boutonSideInfo btn btn-warning col-4 mb-2 rounded rounded p-1 mx-auto d-block"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg></a></button>
                </div>


            </div>
        </div>
    </div>
    <!-- ----------------------------------  FOOTER --------------------------------->
    <footer>
        <?php
        include("../Pandora_nav_footer/footer.php");
        ?>
    </footer>
    <!-- ----------------------------------  FIN_FOOTER --------------------------------->
</body>

</html>