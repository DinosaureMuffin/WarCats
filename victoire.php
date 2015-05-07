<?php
	// Script de FIN DE PARTIE (allocation des loots)
	require_once('include/connect.php');
	require_once('include/data_user.php');

	// Si c'est la defaite
	if ( (int) $_GET['win'] == 0){
		$defaite++;
		$sql_defaite =  "UPDATE 
							`personnages` 
						SET 
							`defaite` = '".$defaite."'
						WHERE 
							`pseudo` = '".$pseudo."'";

		if (!($result_defaite=$db->query($sql_defaite))){
			die('Erreur de Requette(DEFAITE');
		}
		header('Location: lose.php');

	// Si c'est la victoire
	} else {

		$niveau_adversaire = $_GET['adv'];
		$niveau_user = $_GET['me'];
		
		switch ($niveau_adversaire) {
			case 1:
				$gain = 10;
				$tune = 100;
				break;
			case 2:
				$gain = 12;
				$tune = 150;
				break;
			case 3:
				$gain = 15;
				$tune = 200;
				break;
			case 4:
				$gain = 17;
				$tune = 250;
				break;
			case 5:
				$gain = 20;
				$tune = 300;
				break;
			case 6:
				$gain = 25;
				$tune = 450;
				break;
			case 7:
				$gain = 30;
				$tune = 500;
				break;
			case 8:
				$gain = 35;
				$tune = 650;
				break;
			case 9:
				$gain = 40;
				$tune = 700;
				break;
			case 10:
				$gain = 50;
				$tune = 800;
				break;
		}
		//  On defini les nouvellez variables
		$argent = $argent + $tune;
		$experience = $experience + $gain;
		$victoire++;

		$sql_loot =  "UPDATE 
						`personnages` 
					SET 
						`experience`= '".$experience."',
						`gold`= '".$argent."',
						`victoire` = '".$victoire."'
					WHERE 
						`pseudo`='".$pseudo."'";

		if(!($result_loot = $db->query($sql_loot))){
			die('erreur sql loot');
		}

		$nouveau_niveau = 0;

		switch ($experience) {
			case $experience >= 10700:
				$nouveau_niveau = 10;
				break;
			case $experience >= 6700:
				$nouveau_niveau = 9;
				break;
			case $experience >= 4400:
				$nouveau_niveau = 8;
				break;
			case $experience >= 2800:
				$nouveau_niveau = 7;
				break;
			case $experience >= 1700:
				$nouveau_niveau = 6;
				break;
			case $experience >= 950:
				$nouveau_niveau = 5;
				break;
			case $experience >= 500:
				$nouveau_niveau = 4;
				break;
			case $experience >= 250:
				$nouveau_niveau = 3;
				break;
			case $experience >= 100:
				$nouveau_niveau = 2;
				break;
			default:
				break;
		}

		$sql_niveau = "SELECT 
							`niveau` 
						FROM 
							`personnages` 
						WHERE 
							`pseudo`='".$_SESSION['pseudo']."'";

		if(!($result_niveau = $db->query($sql_niveau))){
			die('erreur sql niveau');
		}
		$row_niveau = $result_niveau->fetch_assoc();
		$niveau = $row_niveau['niveau'];

		$pts_lvl = $pts_restants + 3;

		if($nouveau_niveau == $niveau + 1){
			$sql_lvl = "UPDATE 
						`personnages` 
					SET 
						`niveau` = '".$nouveau_niveau."', 
						`pts_restants`= '".$pts_lvl."' 
					WHERE 
						`pseudo`='".$pseudo."'";

			if(!($result_lvl = $db->query($sql_lvl))){
				die('erreur sql lvl');
			}
		}
		header('Location: win.php?xp='.$gain.'&po='.$tune.'' );
	}
?>
