<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">  
    <title>Accueil</title>
</head>

<body>
    <!-- ----------------------------------  navbar ---------------------------------> 
        <?php
            include("../Pandora_nav_footer/nav.php");
        ?>
    <!-- ----------------------------------  navbar ---------------------------------> 
    <div class="video">
        <video autoplay loop muted class="embed-responsive embed-responsive-16by9">
            <source src="video/Project 2.mkv">
        </video>
    </div>

    <!-- ----------------------------------- Video principal ---------------------------  -->
        <div class="section1">
            <div class="imagePresentation">
            </div>
            <div class="titrePresentation">
                <h1>Voyagez</h1>
            </div>
            <div class="textPresentation">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut numquam, nobis illum quam, 
                commodi dolor recusandae iusto deserunt provident dolorem porro quae maiores, earum sapiente 
                maxime repudiandae. Explicabo accusantium vero vel voluptatum recusandae laboriosam placeat ea 
                unde repellendus, at provident amet repellat, quo ipsam sint consectetur illo quasi natus esse!</p>
            </div>
        </div>

        <div class="section2">
            <div class="imagePresentation2">
            </div>
            <div class="titrePresentation2">
                <h1>Explorez</h1>
            </div>
            <div class="textPresentation2">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti id quisquam recusandae necessitatibus eos 
                    placeat eligendi illo vero cum sed cumque nihil laborum similique in accusamus praesentium doloremque quasi,
                     aliquam dolorem quae minima. Et provident, tenetur eos nemo adipisci alias laboriosam possimus illo debitis 
                     nesciunt animi, ut ullam cum iure omnis molestias culpa eveniet numquam commodi. Nam enim harum veniam, itaque 
                     commodi adipisci necessitatibus ut sed voluptatem aliquam. Distinctio totam quis ad illum nihil numquam aperiam 
                     minima eum, quibusdam maxime tenetur, molestiae sequi vero culpa.</p>
            </div>
        </div>

        <div class="section1">
            <div class="imagePresentation3">
            </div>
            <div class="titrePresentation">
                <h1>Découvrez</h1>
            </div>
            <div class="textPresentation">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eligendi expedita, commodi nihil at, 
                    ea laborum consequatur harum earum placeat iste quo sit sequi assumenda. Illo voluptates provident ullam 
                    recusandae corrupti adipisci qui officiis exercitationem fugiat atque, quasi iure maxime voluptatum commodi
                     minus molestias eius autem.</p>
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
<script src="app.js" type="text/javascript"></script>
</html>