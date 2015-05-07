<?php
	require_once('include/connect.php');
	
	if (!(isset($_SESSION['pseudo']))){
		header('location:index.php');
	}
	//Profil du Personnage si on a un GET
	if (isset($_GET['profil'])){
		// Si le GET = SESSION
		if ($_GET['profil'] == $_SESSION['pseudo']){
			header('location:profil.php');
		}

		$adversaire = "SELECT 
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
							`arme`,
							`gold`,
							`victoire`,
							`defaite`
						FROM 
							`personnages`
						WHERE 
							`pseudo`='".$_GET['profil']."'";

		if (!($adversaire_stats = $db->query($adversaire))){
			die ('Erreur de Requete SQL');
		}
		$row_adversaire = $adversaire_stats->fetch_assoc();
		// On set les variables
		$pseudo = $row_adversaire['pseudo'];
		$experience = $row_adversaire['experience'];
		$niveau = $row_adversaire['niveau'];
		$puissance = $row_adversaire['puissance'];
		$vitalite = $row_adversaire['vitalite'];
		$pts_restants = $row_adversaire['pts_restants'];
		$skin = $row_adversaire['skin'];
		$casque = $row_adversaire['casque'];
		$plastron = $row_adversaire['plastron'];
		$jambiere = $row_adversaire['jambiere'];
		$arme = $row_adversaire['arme'];
		$argent = $row_adversaire['gold'];
		require_once('include/data_item.php');

	}
	if (!(isset($_GET['profil']))){ 
		require_once('include/data_user.php');
		require_once('include/data_item.php');
	}

//Profil du Personnage Si on a pas de GET
if (isset($_SESSION['pseudo'])) {
	if (isset ($_GET['increment'])){
		if ($_GET['increment'] == "force"){
				$patate = $puissance + 1 ;
				$restant = $pts_restants - 1;
			if ( $pts_restants <= 0){
					echo 'plus de points a distribuer';
				}
			else{
				// Requete SQL
				$sql="UPDATE `personnages` SET 
				`puissance`= '".$patate."',
				`pts_restants`='".$restant."'  
				WHERE `pseudo`='".$_SESSION['pseudo']."'";

				if (!($result = $db->query($sql))){
					die('Erreur de requete SQL(FORCE)');
				}
			}
		}
		if ($_GET['increment'] == "vitalite"){
				$vita = $vitalite + 1;
				$restant = $pts_restants - 1;
			if ( $pts_restants <= 0){
					echo 'plus de points a distribuer';
				}
			else{
				// Requete SQL
				$sql="UPDATE `personnages` SET 
				`vitalite`='".$vita."',
				`pts_restants`='".$restant."'  
				WHERE `pseudo`='".$_SESSION['pseudo']."'";

				if (!($result = $db->query($sql))){
					die('Erreur de requete SQL(VITALITE)');
				}
			}
		}
	header('location:profil.php');
	}
}
?>

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

			<div class="content_profil">
				<div class="pseudo">
					<img src="img/profil/pate.png">
					<p class="name"><?php echo $pseudo; ?></p>
							<table>
								<tr>
									<th>Experience</th>
									<th>Niveau</th>
									<th>Argent</th>
								</tr>
								<tr>
									<td><?php echo $experience; ?></td>
									<td><?php echo $niveau; ?></td>
									<td><?php echo $argent; ?></td>
									</tr>
						</table>
				</div>


					<div class="statistique">
						<div class="p1">
						<p class="puissance"><?php echo ' FORCE : '.$puissance; ?></p>
							<?php if (!(isset($_GET['profil']))){ ?>
								<form class="form1" method="get" action="profil.php">
									<button type="submit" name="increment" value="force">+</button>
								</form>
							<td class="pt1">
								<?php echo $pts_restants.' pts restant'; ?>
							</td>
							<?php } ?>
						</div>
						<div class="p2">
						<p class="puissance"><?php echo 'VITALITE : '.$vitalite; ?></p>
							<!-- Si On est sur son profil on affiche : -->
								<?php if (!(isset($_GET['profil']))){ ?>
								<form class="form1" method="get" action="profil.php">
									<button type="submit" name="increment" value="vitalite">+</button>
								</form>
							<td class="pt1">
								<?php echo $pts_restants.' pts restant'; ?>
							</td>
							<?php } ?>
						</div>
					</div>
					
				<div class="perso">
					<img src="<?php echo $skin; ?>">
				</div>
				<div class="skills">
					<div class="hat">
						<img src="img/casque60.png">

						<p>CASQUE</p>

								<p><?php echo $casque_nom; ?></p>
								<p><?php echo $casque_armure; ?></p>
					</div>
					<div class="arme">
						<img src="img/hache60.png">
						<p>ARME</p>

								<p><?php echo $arme_nom; ?></p>
								<p><?php echo $arme_degats; ?></p>

					</div>
					<div class="ventre">
						<img src="img/plastron60.png" id="truc" onclick='showAlert()'>
						<p>PLASTRON</p>
					
								<p><?php echo $plastron_nom; ?></p>
								<p><?php echo $plastron_armure; ?></p>

					</div>
					<div class="chaussure">
						<img src="img/bottes60.png">
						<p>JAMBIERE</p>

								<p><?php echo $jambiere_nom; ?>
								<?php echo $jambiere_armure; ?></p>

					</div>
				</div> <!-- fin skills -->
				<?php if (!(isset($_GET['profil']))){ ?>
				<div class= "lancementjeu">
					<a href="combat.php">Combattre !</a>
				</div>
				<?php } ?>
			</div> <!-- Fin DIV contenant -->
			</section>
<?php include('include/footer.html'); ?>
