<?php
	// Script de selection de l'adversaire, de ses stuffs et ses stats
	// Recuperation des donnée de l'user
	require_once('include/data_user.php');
	// Pour trouver un adversaire a niveau +-1 au notre
		$niv_inf = $niveau -1;
		$niv_sup = $niveau +1;
		$sql_adversaire = "SELECT
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
								`gold`
							FROM
								personnages
							WHERE
								`niveau` BETWEEN '".$niv_inf."' AND '".$niv_sup."'
								AND `pseudo` != '".$_SESSION['pseudo']."'
								ORDER BY RAND() LIMIT 1";
								if(!($adversaire = $db->query($sql_adversaire))){
									die('erreur sql');
								}
								if ( $adversaire->num_rows == 0){
									die("ya rien dans ton adversaire");
								}
								$row_adversaire = $adversaire->fetch_assoc();

								// On stocke les données de l'adversaire
								$pseudo_adversaire = $row_adversaire['pseudo'];
								$experience_adversaire = $row_adversaire['experience'];
								$niveau_adversaire = $row_adversaire['niveau'];
								$puissance_adversaire = $row_adversaire['puissance'];
								$vitalite_adversaire = $row_adversaire['vitalite'];
								$pts_restants_adversaire = $row_adversaire['pts_restants'];
								$skin_adversaire = $row_adversaire['skin'];
								$casque_adversaire = $row_adversaire['casque'];
								$plastron_adversaire = $row_adversaire['plastron'];
								$jambiere_adversaire = $row_adversaire['jambiere'];
								$arme_adversaire = $row_adversaire['arme'];
								$argent_adversaire = $row_adversaire['gold'];
								

			// Recuperation des infos du casque
			$sql_casque_adversaire = "SELECT
										`armure`,
										`nom` 
									FROM 
										`casque` 
									WHERE `id`='".$casque_adversaire."'";

			if (!($result_casque_adversaire = $db->query($sql_casque_adversaire))){
				die ('Erreur de Requete SQL (CASQUE)');
			}
			$row_casque_adversaire = $result_casque_adversaire->fetch_assoc();
			$casque_nom_adversaire = $row_casque_adversaire['nom'];
			$casque_armure_adversaire = $row_casque_adversaire['armure'];


			//Recuperation du PLASTRON
			$sql_plastron_adversaire = "SELECT
											`armure`,
											`nom` 
										FROM
											`plastron` 
										WHERE 
											`id`='".$plastron_adversaire."'";

			if (!($result_plastron_adversaire = $db->query($sql_plastron_adversaire))){
				die ('Erreur de Requete SQL (PLASTRON)');
			}
			$row_plastron_adversaire = $result_plastron_adversaire->fetch_assoc();
			$plastron_nom_adversaire = $row_plastron_adversaire['nom'];
			$plastron_armure_adversaire = $row_plastron_adversaire['armure'];

			//Recuperation des JAMBIERE
			$sql_jambiere_adversaire = "SELECT 
											`armure`, 
											`nom` 
										FROM 
											`jambieres` 
										WHERE 
											`id`='".$jambiere_adversaire."'";
			if (!($result_jambiere_adversaire = $db->query($sql_jambiere_adversaire))){
				die ('Erreur de Requete SQL (JAMBIERE)');
			}
			$row_jambiere_adversaire = $result_jambiere_adversaire->fetch_assoc();
			$jambiere_nom_adversaire = $row_jambiere_adversaire['nom'];
			$jambiere_armure_adversaire = $row_jambiere_adversaire['armure'];

			//Recuperation de L'ARME
			$sql_arme_adversaire = "SELECT 
										`degats`,
										`nom` 
									FROM 
										`arme` 
									WHERE 
										`id`='".$arme_adversaire."'";

			if (!($result_arme_adversaire = $db->query($sql_arme_adversaire))){
				die ('Erreur de Requete SQL (ARME)');
			}
			$row_arme_adversaire = $result_arme_adversaire->fetch_assoc();
			$arme_nom_adversaire = $row_arme_adversaire['nom'];
			$arme_degats_adversaire = $row_arme_adversaire['degats'];
			$armure_adversaire = $casque_armure_adversaire + $plastron_armure_adversaire + $jambiere_armure_adversaire;
?>
