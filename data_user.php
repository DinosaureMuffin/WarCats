<?php
//Script de recuperation de données de l'user
$sql = "SELECT `id`,
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
        FROM `personnages` 
        WHERE `pseudo`='".$_SESSION['pseudo']."'";
        
	if (!($result = $db->query($sql))){
		die ('Erreur de Requete SQL');
	}

	$row_user = $result->fetch_assoc();
	// On les stockes dans des variables
	$pseudo = $_SESSION['pseudo'];
	$experience = $row_user['experience'];
	$niveau = $row_user['niveau'];
	$puissance = $row_user['puissance'];
	$vitalite = $row_user['vitalite'];
	$pts_restants = $row_user['pts_restants'];
	$skin = $row_user['skin'];
	$casque = $row_user['casque'];
	$plastron = $row_user['plastron'];
	$jambiere = $row_user['jambiere'];
	$arme = $row_user['arme'];
	$argent = $row_user['gold'];
	$victoire = $row_user['victoire'];
	$defaite = $row_user['defaite'];
