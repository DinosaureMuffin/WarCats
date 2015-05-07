<?php
session_start();
if ( isset($_GET['armure']) ){

// On recupere les valeurs envoyer en AJAX
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
		if ($buff=25){ $statment = ' Vous attaquez sous l\'emprise d\'un sort: -25% de réussite:</br>';
		}
		else { $statment = ' Vous attaquez:</br>'; $buff_Adv = 0; }
		
		// Si la valeur aleatoire et le buff sont <= a la chance de taper et que l'user a encore de la vie
		if($random_missed+$buff<=75 && $vita_user>0){
			$vita_adversaire = $vita_adversaire - round(($degats_bruts_user / (1+($armure_adversaire/30))), 0, PHP_ROUND_HALF_UP);
			echo $statment.$Name_adversaire .' a perdu '. round($degats_bruts_user / (1+($armure_adversaire/30)), 0, PHP_ROUND_HALF_UP) .' points de vie</br>';
		} else if ($vita_user>0){
			echo "Vous attaquez :</br>attaque ratée</br>";
		}
		// On viens de jouer donc on remet le buff a 0
		$buff=0;

	// Attaque de l'adversaire
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

		$adversaire_missed = rand(1, 100);
		if($adversaire_missed+$buffAdv<=75 && $vita_adversaire>0){
			$vita_user = $vita_user - round(($degats_bruts_adversaire / (1+($armure/30))), 0, PHP_ROUND_HALF_UP);
			echo $Name_adversaire.$statment.$name .' à perdu '. round($degats_bruts_adversaire / (1+($armure/30)), 0, PHP_ROUND_HALF_UP) .' points de vie</br>';
		} else if ($vita_adversaire>0){
			echo $Name_adversaire.$statment." attaque ratée</br>";
			$buff = 0;
		}
		$buffAdv = 0;
	}
	else {
		// Il attaque
		$adversaire_compt = rand(1,100);
		if ($adversaire_compt >=60){ 
			$degats_bruts_adversaire = $degats_bruts_adversaire/2; $buff = 25;
			$statment = ' vous inflige un coup défensif : -25% de réussite sur votre prochaine attaque </br>';
		}
		else { $statment = ' vous attaque :</br>'; }
		// Variable d'echec
		$adversaire_missed = rand(1, 100);
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
		$random_missed = rand(1, 100);
		if($random_missed+$buff<=75 && $vita_user>0){
			$vita_adversaire = $vita_adversaire - round(($degats_bruts_user / (1+($armure_adversaire/30))), 0, PHP_ROUND_HALF_UP);
			echo 'Vous attaquez :</br>'.$Name_adversaire .' à perdu '. round($degats_bruts_user / (1+($armure_adversaire/30)), 0, PHP_ROUND_HALF_UP) .' points de vie</br>';
		} else if ($vita_user>0){
			echo "Vous attaquez :</br>attaque ratée</br>";
		}
		$buff =0;
	}
}
?>
<script>
var vita = <?php echo json_encode('='.$vita_adversaire.'='.$vita_user.'='.$buff.'='.$buffAdv."=") ?>;
</script>
