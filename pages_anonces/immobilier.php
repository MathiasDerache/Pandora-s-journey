<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css"> 
    <title>Immobilier</title>
</head>

<?php function body(){ ?>
<body class="position-relative">
    <!-- ----------------------------------  navbar ---------------------------------> 
        <?php
            include("../Pandora_nav_footer/nav.php")
        ?>
    <!-- ----------------------------------  navbar ---------------------------------> 
        <div class="container-fluid annonces">
            
                <?php } ?>
            <?php function card($annonces, $i){ ?>
                <div class="row lignesN">
                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 lignes">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top btn btn-info" alt="">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $annonces[$i]->getTitreAnn() ?></h5>
                            <p class="card-text"><?php echo $annonces[$i]->getDescAnn() ?></p>
                            <a href="annonce_controlleur.php?id=<?php echo $annonces[$i]->getIdAnn() ?>" class="btn btn-primary stretched-link">Consulter</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php } 

        function pagination(){ ?>
    <!-- ----------------------------------  pagination ---------------------------------> 

        <div class="container-fluid lignes">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mx-auto">
                        <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    <!-- ----------------------------------  pagination ---------------------------------> 


        <!-- ----------------------------------  FOOTER ---------------------------------> 
        <?php function footer(){ ?>
        <footer>
    <?php
        include("../Pandora_nav_footer/footer.php");
    ?>
</footer> 
<?php } ?>
    <!-- ----------------------------------  FIN_FOOTER ---------------------------------> 
</body>
</html>