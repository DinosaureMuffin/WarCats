<?php 
	require_once('include/connect.php');
	require_once('include/data_user.php');
	include('include/header.html'); ?>
		<section id= "profil">
			<header>
				<h1><a href="index.php">WARCATS</a></h1>
				<h2>1<span>er</span> jeu en ligne de combat de chats</h2>
				<ul id="menu-accordeon">
					<li><a href="#">MENU</a>
						<ul>
							<li><a href="index.php">Accueil</a></li>
							<li><a href="profil.php">Profil</a></li>
							<li><a href="classement.php">Classement</a></li>
							<li><a href="deconnexion.php">Déconnexion</a></li>
						</ul>
					</li>
				</ul>
			</header>
	<div class= "container">
		<div class="content">
			<h1 class="victoire">DEFAITE ...</h1>
			<a href="profil.php">Retour vers le profil</a>
				<div class="victoire">
					<img src="img/Chats/defaite.png">
				</div>

	</div> <!-- Fin DIV container -->

</body>
</html>
