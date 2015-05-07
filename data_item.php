<?php
// RECUPERATION DES ITEMS 
// A inserer apres un require_once('data_users.php');

	// Recuperation du CASQUE
	$sql_casque = "SELECT `armure`, `nom` FROM `casque` WHERE `id`='".$casque."'";
		if (!($result_casque = $db->query($sql_casque))){
			die ('Erreur de Requete SQL (CASQUE)');
		}
		$row_casque = $result_casque->fetch_assoc();
		$casque_nom = $row_casque['nom'];
		$casque_armure = $row_casque['armure'];

	//Recuperation du PLASTRON
	$sql_plastron = "SELECT `armure`, `nom` FROM `plastron` WHERE `id`='".$plastron."'";
		if (!($result_plastron = $db->query($sql_plastron))){
			die ('Erreur de Requete SQL (PLASTRON)');
		}
		$row_plastron = $result_plastron->fetch_assoc();
		$plastron_nom = $row_plastron['nom'];
		$plastron_armure = $row_plastron['armure'];

	//Recuperation des JAMBIERE
	$sql_jambiere = "SELECT `armure`, `nom` FROM `jambieres` WHERE `id`='".$jambiere."'";
		if (!($result_jambiere = $db->query($sql_jambiere))){
			die ('Erreur de Requete SQL (JAMBIERE)');
		}
		$row_jambiere = $result_jambiere->fetch_assoc();
		$jambiere_nom = $row_jambiere['nom'];
		$jambiere_armure = $row_jambiere['armure'];

	//Recuperation de L'ARME
	$sql_arme = "SELECT `degats`, `nom` FROM `arme` WHERE `id`='".$arme."'";
		if (!($result_arme = $db->query($sql_arme))){
			die ('Erreur de Requete SQL (ARME)');
		}
		$row_arme = $result_arme->fetch_assoc();
		$arme_nom = $row_arme['nom'];
		$arme_degats = $row_arme['degats'];

	// Armure totale
	$armure = $casque_armure + $plastron_armure + $jambiere_armure;
	?>
