<?php require_once('include/connect.php'); ?>
<?php include('include/header.html'); ?>
	<section id= "classement">
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
	<div class="container">		
		<div class="content_classement">			
		<table>
				<tr>
					<th>Classement</th>
					<th>Pseudo</th>
					<th>Victoire</th>
					<th>Défaite</th>
					<th>Ratio</th>
				</tr>
			<?php
				if (!(isset($_SESSION['pseudo']))){
					header('location:index.php');
				}
				require_once('include/data_user.php');
				$requete = "SELECT `pseudo`, `victoire`,`defaite` FROM `personnages` ORDER BY `victoire`DESC";
				if(!($result = $db->query($requete))){
					die('Erreur de requete SQL(CLASSEMENT)');
				}
				else{
					$classement = 1;
					while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td><?php echo $classement;?></td>
							<?php 

								if ($_SESSION['pseudo'] == $row['pseudo']){
									$profil = $row['pseudo'];
									echo ('<td class="target"><a href="profil.php?profil='.$profil.'">'.$row['pseudo'].'</a></td>');
								}
								else{
									$profil = $row['pseudo'];
									echo ('<td><a href="profil.php?profil='.$profil.'">'.$row['pseudo'].'</a></td>');
								}
?>


							
							<td><?php echo $row['victoire'];?></td>
							<td><?php echo $row['defaite'];?></td>
							<td><?php 
								if ($row['defaite'] == 0){
									$defaite = 1;
								}
								else{$defaite = $row['defaite'];}
								echo round($row['victoire']/$defaite, 1, PHP_ROUND_HALF_UP);?>
							</td>			
						</tr>
						<?php $classement++;
					}
				}
?>	


		</table>
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

	</div> <!-- Fin DIV container -->

</body>
</html>
