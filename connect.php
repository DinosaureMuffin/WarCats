<?php
//Fichier de Connexion
	session_start();
	$db = new mysqli( 'localhost' , 'root' , '' , 'warcats' );
	if( $db->connect_errno ){
		die( $db->connect_error );
	}

?>
