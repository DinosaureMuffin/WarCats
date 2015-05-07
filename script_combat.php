<?php	
	while($pv_user > 0 ){
		$random_missed = rand (1, 100); $random_attack = rand (1, 100);
		if($random = 2){
			echo $pseudo_adversaire ." attaque en premier ";
			if($random_attack > 60){
			echo 'et fait une attaque défensive ';//on entre dans attaque defensive
			if($random_missed <= 75){
				echo' reussie '; //attaque defensive réussie
				$pv_user = $pv_user - round(($degats_bruts_adversaires/2) / (1+($armure/30)), 0,PHP_ROUND_HALF_UP);
				echo $pseudo .' à perdu '.round(($degats_bruts_adversaires/2) / (1+($armure/30)), 0, PHP_ROUND_HALF_UP) .' points de vie';
				echo $pseudo .' a maintenant '. $pv_user;
			} else{
				echo' ratée'; // attaque defensive ratée
			}
			} else{
				echo "et attaque tout court "; //Attaque tout court
				if ($random_missed <= 75) {
					echo " et réussi ";//attaque tout court réussi
					$pv_user = $pv_user - round($degats_bruts_adversaires / (1+($armure/30)), 0,PHP_ROUND_HALF_UP);
					echo $pseudo .' à perdu '.round($degats_bruts_adversaires / (1+($armure/30)), 0, PHP_ROUND_HALF_UP) .' points de vie';
					echo $pseudo .' a maintenant '. $pv_user;
				} else {
					echo' ratée '; // attaque tout court ratée
				}
			}
		}
	}

?>
