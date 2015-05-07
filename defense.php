?php
	session_start();
	if ( isset($_GET['armure']) ){

	// On recupere les valeurs
	$name = $_SESSION['pseudo'];
	$vita_user = $_GET['userVita'];
	$armure = $_GET['armure'];
	$degats_bruts_user =  $_GET['degats'];
	$Name_adversaire = $_GET['adversaireName'];
	$vita_adversaire =  $_GET['adversaireVita'];
	$armure_adversaire = $_GET['adversaireArmure'];
	$degats_bruts_adversaire = $_GET['adversaireDegats'];
	$random = $_GET['random'];
	$buff = $_GET['buff'];
	$buffAdv = $_GET['buffAdv'];

	// Variable aléatoire
	// Qui commence ?
	// Chance de réussite

	// Si c'est a nous de jouer !
	if($random == 1){
		$random_missed = rand(1, 100);
		if ($buff==25){ $statment = 'avec -25% de réussite :</br>';
		}
		else { $statment = ''; }

		// On effectue un Coup Defensif
		$degats_bruts_user= $degats_bruts_user/2; 
		$buffAdv = 25;

		if($random_missed+$buff<=75 && $vita_user>0){
			$vita_adversaire = $vita_adversaire - round(($degats_bruts_user / (1+($armure_adversaire/30))), 0, PHP_ROUND_HALF_UP);
			echo 'Vous attaquez de façon defensive </br>'.$Name_adversaire .$statment.$Name_adversaire .' à perdu '. round($degats_bruts_user / (1+($armure_adversaire/30)), 0, PHP_ROUND_HALF_UP) .' points de vie</br>';
		} else if ($vita_user>0){
			echo "Vous attaquez de façon defensive :</br>attaque ratée</br>";
			$buffAdv = 0;
		}
		// On viens de jouer donc on remet le buff a 0
		$buff=0;

		// Chance que l adversiare face un coup offensif ou defensif
		$adversaire_compt = rand(1,100);
		if ($adversaire_compt >=60){ 
			$degats_bruts_adversaire = $degats_bruts_adversaire/2; 
			$buff = 25;
			$statment = ' vous inflige un coup défensif : -25% de réussite sur votre prochaine attaque </br>';
		}
		else {
			$statment = ' vous attaque :</br>';
		}

		if ($buffAdv ==25){ $statment = $statment.' avec -25% de réussite :</br>';
		}
		

		$adversaire_missed = rand (1, 100);
		if($adversaire_missed+$buffAdv<=75 && $vita_adversaire>0){
			$vita_user = $vita_user - round(($degats_bruts_adversaire / (1+($armure/30))), 0, PHP_ROUND_HALF_UP);
			echo $Name_adversaire.$statment.'vous avez perdu '. round($degats_bruts_adversaire / (1+($armure/30)), 0, PHP_ROUND_HALF_UP) .' points de vie</br>';
		} else if ($vita_adversaire>0){
			echo $Name_adversaire.$statment." attaque ratée</br>";
			$buff = 0;
		}
		$buffAdv = 0;
	}
	else {
		// Il attaque
		$adversaire_compt = rand (1,100);
		if ($adversaire_compt >=60){ 
			$degats_bruts_adversaire = $degats_bruts_adversaire/2; $buff = 25;
			$statment = ' vous inflige un coup défensif : -25% de réussite sur votre prochaine attaque </br>';
		}
		else { $statment = ' vous attaque:</br>'; }
		$adversaire_missed = rand (1, 100);
		if ($buffAdv==25){ 
			$statment = $statment.' avec -25% de réussite :</br>';
		}

		if($adversaire_missed+$buffAdv<=75 && $vita_adversaire>0){
			$vita_user = $vita_user - round(($degats_bruts_adversaire / (1+($armure/30))), 0, PHP_ROUND_HALF_UP);
			echo $Name_adversaire.$statment.$name .' à perdu '. round($degats_bruts_adversaire / (1+($armure/30)), 0, PHP_ROUND_HALF_UP) .' points de vie</br>'.$buff;
		} else if ($vita_adversaire>0){
			echo $Name_adversaire.$statment." attaque ratée</br>";
			$buff = 0;
		}
		$buffAdv = 0;

		// On attaque
		$random_missed = rand (1, 100);

		if ($buff==25){ $statment = ' avec -25% de réussite :</br>';
		}
		else{
			$statment ='</br>';
		}

		// On effectue un Coup Defensif

		if($random_missed+$buff<=75 && $vita_user>0){
			$degats_bruts_user = $degats_bruts_user/2; 
			$buffAdv = 25;
			$vita_adversaire = $vita_adversaire - round(($degats_bruts_user / (1+($armure_adversaire/30))), 0, PHP_ROUND_HALF_UP);
			echo ' Vous attaquez de façon defensive '.$Name_adversaire.$statment.$Name_adversaire.' à perdu '.round($degats_bruts_user / (1+($armure_adversaire/30)), 0, PHP_ROUND_HALF_UP).' points de vie</br>';
		} else if ($vita_user>0){
			echo ' Vous attaquez de façon defensive :</br>attaque ratée</br>';
			$buffAdv = 0;
		}
		$buff =0;
	}
}


// SCRIPT D'ATTAQUE OFFENSIVE
// SCRIPT LANCER PAR L'AJAX GRACE AU BOUTON ATTAQUE OFFENSIVE
// RECUPERE LES VARIABLES DE COMBAT ( chance de touche, force, vita restante ...)
// DEFINI LES VARIABLES LIEE AU COUP (Est ce qu'on touche ?)
// ON EFFECTU L ACTION DE COUP OU NON 

// INCLUDE DU SCRIPT DU BOT
?>
<script>
var vita = <?php echo json_encode('='.$vita_adversaire.'='.$vita_user.'='.$buff.'='.$buffAdv."=") ?>;
</script>
