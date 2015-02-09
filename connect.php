//Fichier de Connexion
<?php
	$db = new mysqli( 'localhost' , '' , '' , 'warcats' );
	if( $db->connect_errno ){
		die( $db->connect_error );
	}
