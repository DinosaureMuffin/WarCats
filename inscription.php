<?php include('include/header.html'); ?>
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
		<div class="content">
			<div class = "logo"><a href="#"><img src="img/logo2.png"></a>
				<h4>Déjà
					<span>
						<!-- Compteur -->
						<?php
						require_once('include/connect.php');
						$compteur="SELECT `id` FROM `personnages` WHERE 1";

						if(!($rep = $db->query($compteur))){
							die('erreur de Requete(Compteur)');
						}
						// On compte le nombre d'entrée récuperé par la requette.
						$num_rows = mysqli_num_rows($rep);
						echo $num_rows;
						?>	
					</span> chats-battants !
				</h4>
			</div>
<!--Formulaire d'inscription -->
<?php
require_once('include/connect.php');

// INSCRIPTION

if ( count($_POST) > 0){
	$sql_login = "INSERT INTO
				login
				(
				`pseudo`,
				`email`,
				`motdepasse`
				)
				VALUES
				(
				'".$db->real_escape_string(strip_tags($_POST['pseudo']))."',
				'".$db->real_escape_string(strip_tags($_POST['email']))."',
				'".$db->real_escape_string(strip_tags($_POST['motdepasse']))."'
				);";

if( !($db->query( $sql_login ))){
	die("Echec de l'insertion(LOGIN)");
}

$sql_perso = "INSERT INTO
				personnages
				(
				`pseudo`,
				`experience`,
				`niveau`,
				`puissance`,
				`vitalite`,
				`pts_restants`,
				`skin`,
				`casque`,
				`plastron`,
				`jambiere`,
				`arme`	
				)
				VALUES
				(
				'".$db->real_escape_string(strip_tags($_POST['pseudo']))."',
				0,
				1,
				2,
				2,
				6,
				'img/Chats/nu.png',
				1,
				1,
				1,
				1
				);";

	if( !($db->query( $sql_perso ))){
	die("Echec de l'insertion(PERSO)");
	}
	else{
	echo 'Féliciations '.$_POST['pseudo'].' vous avez un nouveau personnage <a href="index.php">Connectez vous !</a>';
	}
}

else{
?>
		<form id="conect" action="inscription.php" method="post">
		<fieldset class="suscribe">
		<legend>Inscription</legend>
		<input type= "text" name= "pseudo" id= "pseudo" placeholder= "Votre pseudo" /> <br/ >
		<input type= "email" name= "email" id= "email" placeholder= "Votre E-mail" /> <br/ >
		<input type= "password" name= "motdepasse" id= "pass" placeholder= "Votre mot de passe"/> <br/ >
		</fieldset>
		<input type="submit" value="S'inscrire!" id="suscribe"/>
		</form>
<?php 
} 
?>
</div> <!-- Fin DIV content -->
	<footer>
		<div class= "footer">
			<ul>
				<li>Aucun chat n'a été maltraité ! </li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="mention.html">Mentions légales</a></li>
			</ul>
		</div> <!-- Fin DIV footer -->
	</footer>
</section>
</div> <!-- Fin DIV container -->
</body>
</html>
