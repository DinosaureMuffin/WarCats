<?php
	require_once('include/connect.php');
	require_once('include/data_user.php');
	require_once('include/data_item.php');

	$sql_stuff_plastron = "SELECT `armure`, `nom`, `image`, `prix` FROM `plastron` ORDER BY `armure` ASC";
		if (!($result_stuff_plastron = $db->query($sql_stuff_plastron))){
			die ('Erreur de Requete SQL (stuff_plastron)');
		}
		while($row_stuff_plastron = $result_stuff_plastron->fetch_assoc()){
			$stuff_plastron_nom = $row_stuff_plastron['nom'];
			$stuff_plastron_armure = $row_stuff_plastron['armure'];
			$stuff_plastron_skin = $row_stuff_plastron['image'];
			$stuff_plastron_prix = $row_stuff_plastron['prix'];

				 $plastrons_nom[] = $stuff_plastron_nom;
				 $plastrons_skin[] = $stuff_plastron_skin;
				 $plastrons_armure[] = $stuff_plastron_armure;
				 $plastrons_prix[] = $stuff_plastron_prix;
		}
		// for ($i=0; $i < 3; $i++) {
		// 	foreach (array('nom','skin','armure','prix','skin') as $value) {
		// 		echo $plastrons_($value)[$i];
		// 	}
		// }
		echo $plastrons_nom[0];
		echo $plastrons_skin[0];
		echo $plastrons_armure[0];
		echo $plastrons_prix[0];
		echo $plastrons_skin[1];
		echo $plastrons_nom[1];
		echo $plastrons_armure[1];
		echo $plastrons_prix[1];
		echo $plastrons_skin[2];
		echo $plastrons_nom[2];
		echo $plastrons_armure[2];
		echo $plastrons_prix[2];
		echo $plastrons_skin[3];
		echo $plastrons_nom[3];
		echo $plastrons_armure[3];
		echo $plastrons_prix[3];


	$sql_stuff_casque = "SELECT `armure`, `nom`, `image`, `prix` FROM `casque` ORDER BY `armure` ASC";
		if (!($result_stuff_casque = $db->query($sql_stuff_casque))){
			die ('Erreur de Requete SQL (stuff_CASQUE)');
		}
		while($row_stuff_casque = $result_stuff_casque->fetch_assoc()){
			$stuff_casque_nom = $row_stuff_casque['nom'];
			$stuff_casque_armure = $row_stuff_casque['armure'];			
			$stuff_casque_skin = $row_stuff_casque['image'];
			$stuff_casque_prix = $row_stuff_casque['prix'];
				
				 $casques_nom[] = $stuff_casque_nom;
				 $casques_armure[] = $stuff_casque_nom;
				 $casques_skin[] = $stuff_casque_skin;
				 $casques_prix[] = $stuff_casque_prix;
		}
		echo $casques_nom[0];
		echo $casques_skin[0];
		echo $casques_armure[0];
		echo $casques_prix[0];
		echo $casques_nom[1];
		echo $casques_skin[1];
		echo $casques_armure[1];
		echo $casques_prix[1];
		echo $casques_nom[2];
		echo $casques_armure[2];
		echo $casques_armure[2];
		echo $casques_prix[2];
		echo $casques_nom[3];
		echo $casques_armure[3];
		echo $casques_armure[3];
		echo $casques_prix[3];

	$sql_stuff_arme = "SELECT `degats`, `nom`, `image`,`prix` FROM `arme` ORDER BY `degats` ASC";
		if (!($result_stuff_arme = $db->query($sql_stuff_arme))){
			die ('Erreur de Requete SQL (stuff_arme)');
		}
		$armes = [];
		while($row_stuff_arme = $result_stuff_arme->fetch_assoc()){
			$stuff_arme_nom = $row_stuff_arme['nom'];
			$stuff_arme_degats = $row_stuff_arme['degats'];
			$stuff_arme_skin = $row_stuff_arme['image'];
			$stuff_arme_prix = $row_stuff_arme['prix'];

			$armes_nom[] = $stuff_arme_nom;
			$armes_degats[] = $stuff_arme_degats;
			$armes_skin[] = $stuff_arme_skin;
			$armes_prix[] = $stuff_arme_prix;

		}
		echo $armes_nom[0];
		echo $armes_degats[0];
		echo $armes_skin[0];
		echo $armes_prix[0];
		echo $armes_nom[1];
		echo $armes_degats[1];
		echo $armes_skin[1];
		echo $armes_prix[1];
		echo $armes_nom[2];
		echo $armes_degats[2];
		echo $armes_skin[2];
		echo $armes_prix[2];
		echo $armes_nom[3];
		echo $armes_degats[3];
		echo $armes_skin[3];
		echo $armes_prix[3];
	$sql_stuff_jambieres = "SELECT `armure`, `nom`, `image`,`prix` FROM `jambieres` WHERE 1;";
		if (!($result_stuff_jambieres = $db->query($sql_stuff_jambieres))){
			die ('Erreur de Requete SQL (stuff_jambieres)');
		}
		while($row_stuff_jambieres = $result_stuff_jambieres->fetch_assoc()){
			$stuff_jambieres_nom = $row_stuff_jambieres['nom'];
			$stuff_jambieres_armure = $row_stuff_jambieres['armure'];
			$stuff_jambieres_skin = $row_stuff_jambieres['image'];
			$stuff_jambieres_prix = $row_stuff_jambieres['prix'];	

				 $jambieres_nom[] = $stuff_jambieres_nom;
				 $jambieres_armure[] = $stuff_jambieres_armure;
				 $jambieres_skin[] = $stuff_jambieres_skin;
				 $jambieres_prix[] = $stuff_jambieres_prix;

		}
		echo $jambieres_nom[0];
		echo $jambieres_armure[0];
		echo $jambieres_skin[0];
		echo $jambieres_prix[0];
		echo $jambieres_nom[1];
		echo $jambieres_armure[1];
		echo $jambieres_skin[1];
		echo $jambieres_prix[1];
		echo $jambieres_nom[2];
		echo $jambieres_armure[2];
		echo $jambieres_skin[2];
		echo $jambieres_prix[2];
		echo $jambieres_nom[3];
		echo $jambieres_armure[3];
		echo $jambieres_skin[3];
		echo $jambieres_prix[3];
