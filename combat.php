<?php require_once('include/connect.php');
	require_once('include/data_user.php');
	require_once('include/data_item.php');
	// On defini un adversaire
	require_once('include/data_adversaire.php');
	// SET des variables de base
	// Stats de notre perso
		$vita_user = 10 + $vitalite*10;
		// $armusre;
		$degats_bruts_user = $puissance * $arme_degats;
	//Stats de l'adversaire
		// $armure_adversaire;
		$degats_bruts_adversaire =  $puissance_adversaire * $arme_degats_adversaire;
		$vita_adversaire = 10 + $vitalite_adversaire*10; //rajouter niveau*10 pour plus de vie
	// RANDOM
		$random = rand (1,2);
		$buff = 0;
		$buffAdv = 0;
	
	
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
<div class="content_profil">
		<div class="combat">
			<div class="user1name">
				<h4><?php echo $pseudo; ?></h4>
			</div>
			<div class="user1">
				<img src="img/combat/coeur.png">
				<p id="vitalite_user"><?php echo $vita_user; ?></p>
			</div>
			<div class="user2name">
				<h4 id="pseudo_adv"><?php echo $pseudo_adversaire; ?></h4>
			</div>
			<div class="user2">
				<img src="img/combat/coeur.png">
				<p id="vitalite_adversaire"><?php echo $vita_adversaire; ?></p>
			</div>
			<div class="fight1">
				<img src="<?php echo $skin; ?>">
			</div> <!-- Fin DIV fight1 -->
			<div id="texteCombat">
			</div>
			<div class="fight2">
				<img src="<?php echo $skin_adversaire; ?>">
			</div><!-- Fin DIV fight2 -->

			<div class="attack">
				<h4>Attaque</h4>
				<button id="attaque"><img src="img/combat/attaque.png"></button>
			</div> <!-- Fin DIV attack -->
			<div class="defense">
				<h4>Défense</h4>
				<button id="defense"><img src="img/combat/defense.png"></button>
			</div> <!-- Fin DIV defense-->


		</div> <!-- Fin DIV combat -->
		<!-- On classe les stats -->
		<table style="visibility:hidden">
				<tr>
					<td id="random"><?php echo $random;?></td>
					<td id="vita"><?php echo $vita_user; ?></td>
					<td id="armure"><?php echo $armure; ?></td>
					<td id="degats"><?php echo $degats_bruts_user; ?></td>
					<td id="buff"><?php echo $buff; ?></td>
					<td id="niveau"><?php echo $niveau; ?></td>
				</tr>
				<tr>
					<td id="niveauadv"><?php echo $niveau_adversaire; ?></td>
					<td id="buffAdv"><?php echo $buffAdv; ?></td>
					<td id="vitaAdv"><?php echo $vita_adversaire; ?></td>
					<td id="armureAdversaire"><?php echo $armure_adversaire; ?></td>
					<td id="degatsAdversaire"><?php echo $degats_bruts_adversaire; ?></td>
				</tr>
		</table>

		

		<?php include('include/footer.html'); ?>
	<script src="include/jquery.min.js"></script>
	<script>
			// Stats USER
			// var vita = <?php echo $vita_user;?>;

			var random = document.getElementById('random').innerHTML;
			var userVita = document.getElementById('vita').innerHTML;
			var armure = document.getElementById('armure').innerHTML;
			var degats = document.getElementById('degats').innerHTML;
			var buff = document.getElementById('buff').innerHTML;
			var buffAdv = document.getElementById('buffAdv').innerHTML;
			var niveau = document.getElementById('niveau').innerHTML;
			// Stats Adversaire
			var niveauadv = document.getElementById('niveauadv').innerHTML;
			var adversaireName = document.getElementById('pseudo_adv').innerHTML;
			var adversaireVita = document.getElementById('vitaAdv').innerHTML;
			var armureAdversaire = document.getElementById('armureAdversaire').innerHTML;
			var degatsAdversaire = document.getElementById('degatsAdversaire').innerHTML;
			$( document ).ready(function() {
				$('#attaque').click( function(){
					$.get( "include/attaque.php", { userVita: userVita , armure: armure, degats: degats,adversaireName: adversaireName, adversaireVita: adversaireVita, adversaireArmure: armureAdversaire, adversaireDegats: degatsAdversaire, random: random,buff: buff, buffAdv:buffAdv } )
						.done( function( data ){
							var zoneCombat = $( '#texteCombat' ).val(data);
							var split = data.split('='); 
							// console.log(split[2]);
							// console.log(split[3]);
							console.log(userVita);
							document.getElementById('vitalite_user').innerHTML = split[3];
							userVita = split[3];
							document.getElementById('vitalite_adversaire').innerHTML = split[2];
							adversaireVita = split[2];
							console.log(split[4]);
							buff = split[4];
							buffAdv = split[5];
							if (userVita <= 0){
								console.log('DEFAITE');
								document.location.href='victoire.php?win=0';
							}
							if (adversaireVita <= 0){
								console.log('VICTOIRE');
								document.location.href='victoire.php?win=1&adv='+niveauadv+'&me='+niveau+'';
							}
							document.getElementById('texteCombat').innerHTML += '</br>'+zoneCombat[0].value;
							var retour;
						} );
				});

				// DEFENSE
				$('#defense').click( function(){
					console.log('def');
					$.get( "include/defense.php", { userVita: userVita , armure: armure, degats: degats,adversaireName: adversaireName, adversaireVita: adversaireVita, adversaireArmure: armureAdversaire, adversaireDegats: degatsAdversaire, random: random,buff: buff, buffAdv:buffAdv } )
						.done( function( data ){
							var zoneCombat = $( '#texteCombat' ).val(data);
							var split = data.split('='); 
							// console.log(split[2]);
							// console.log(split[3]);
							document.getElementById('vitalite_user').innerHTML = split[3];
							userVita = split[3];
							document.getElementById('vitalite_adversaire').innerHTML = split[2];
							adversaireVita = split[2];
							buff = split[4];
							buffAdv = split[5];
							if (userVita <= 0){
								console.log('DEFAITE');
								document.location.href='victoire.php?win=0';
							}
							if (adversaireVita <= 0){
								console.log('VICTOIRE');
								document.location.href='victoire.php?win=1&adv='+niveauadv+'&me='+niveau+'';
							}
							document.getElementById('texteCombat').innerHTML += '</br>'+zoneCombat[0].value;
							var retour;
						} );
				});
			});
	</script>
</body>
</html>
