<?php require_once('include/connect.php');
	if (isset($_SESSION['pseudo'])){
	header('Location: profil.php');
	}
	if (count($_POST) > 0){
		$sql="SELECT `pseudo`,`motdepasse`,`email` FROM `login` WHERE `pseudo`='".$db->real_escape_string(strip_tags($_POST['pseudo']))."'";
		if (!($result = $db->query($sql))){
			die('Erreur de requete SQL');
		}
		if ( $result->num_rows > 0){
			$row = $result->fetch_assoc();
			if ($row['motdepasse'] == $_POST['password']){
				$_SESSION['pseudo'] = $row['pseudo'];
				$_SESSION['motdepasse'] = $row['motdepasse'];
				$_SESSION['email'] = $row['email'];
				header('location:profil.php');
			}else{
				echo 'Identifiants incorrects !';
			}
		}
	}
 ?>
<?php include('include/header.html'); ?>
		<section id= "accueil">
			<header>
				<h1><a href="index.php">WARCATS</a></h1>
				<h2>1<span>er</span> jeu en ligne de combat de chats</h2>
			</header>
			<div class="content">
				<div class = "logo"><a href="#"><img src="img/logo2.png"></a>
				<h4>Déjà
					<span>
						<?php
						$compteur="SELECT `id` FROM `personnages` WHERE 1";
						if(!($rep = $db->query($compteur))){
							die('erreur de Requete(Compteur)');
						}
// On compte le nombre d'entrée récuperé par la requette.
						$num_rows = mysqli_num_rows($rep);
						echo $num_rows;
						?>	
					</span> chats-battants !</h4>
				</div>
					<!--Formulaire de connexion / inscription -->
					<form id="conect" method= "post" action="index.php">
						<fieldset>
							<legend>Connexion</legend>
							<input type= "text" name= "pseudo" id= "pseudo" placeholder="Votre pseudo"/> <br/ >
							<input type= "password" name= "password" id= "pass" placeholder="Votre mot de passe"/> <br/ >
							<input type="submit" value="Connexion " />
						</fieldset>
						<p>Pas encore inscrit ? <a href="inscription.php">Inscris-toi ici !</a></p>
					</form>
				</div> <!-- Fin DIV content -->
<?php include('include/footer.html'); ?>
			
