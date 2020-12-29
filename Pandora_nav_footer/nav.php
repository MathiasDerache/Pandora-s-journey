<?php
function navBar()
{
?>
    <nav class="container-fluid fixed-top">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-1 col-xl-1">
                <a href="../../pandora_accueil/index.php"><img src="images/Logo.png" alt="logo pandora" class="img-fluid" width="90%"></a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 listnav">
                <ul>
                    <li><a href="#" class="nav-link text-white">Immobilier</a></li>
                    <li><a href="#" class="nav-link text-white">Travail</a></li>
                    <li><a href="#" class="nav-link text-white">Loisir</a></li>
                    <li><a href="#" class="nav-link text-white">Contacts</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                <h2 class="bg-warning rounded-pill"><a href="#" class="nav-link text-white">Billeterie</a></h2>
            </div>
        </div>
    </nav>
<?php
}
