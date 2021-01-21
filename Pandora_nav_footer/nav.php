<?php
function navBar()
{
?>
	<nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top">

		<div class="container">

			<div class="heading">

				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNav">

					<div class="menu-icon">
						<div class="icon_span"></div>
						<svg x="0" y="0" width="54px" height="54px" viewBox="0 0 54 54">
							<path d="M16.500,27.000 C16.500,27.000 24.939,27.000 38.500,27.000 C52.061,27.000 49.945,15.648 46.510,11.367 C41.928,5.656 34.891,2.000 27.000,2.000 C13.193,2.000 2.000,13.193 2.000,27.000 C2.000,40.807 13.193,52.000 27.000,52.000 C40.807,52.000 52.000,40.807 52.000,27.000 C52.000,13.000 40.837,2.000 27.000,2.000"></path>
						</svg>
					</div>

				</button>

			</div>

			<div class="collapse navbar-collapse" id="myNav">

				<ul class="navbar-nav">

					<li><a href="../accueil/accueilController.php" class="nav-link text-white">Accueil</a></li>

					<li><a href="../annonce/liste_annonces_controleur.php?type=annonces_immobilier" class="nav-link text-white">Immobilier</a></li>

					<li><a href="../annonce/liste_annonces_controleur.php?type=annonces_travail" action="annonces_travail" class="nav-link text-white">Travail</a></li>

					<li><a href="../annonce/liste_annonces_controleur.php?type=annonces_loisir" action="annonces_loisir" class="nav-link text-white">Loisir</a></li>

					<li><a href="../forum/forumcontrolleur.php" class="nav-link text-white">Forum</a></li>

					<li><a href="../contact/contactControlleur.php" class="nav-link text-white">Contacts</a></li>

					<li><a href="../billeterie/BilleterieController.php" class="nav-link text-white">Billet</a></li>

				</ul>
			</div>
		</div>
	</nav>
<?php
}
