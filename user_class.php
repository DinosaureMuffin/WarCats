<?php 

class user{
	private $pseudo; 
	private $experience; 
	private $niveau;
	private $puissance;
	private $vitalite;
	private $pts_restants; 
	private $skin;
	private $casque; 
	private $plastron; 
	private $jambiere; 
	private $arme;
	private $argent;
	private $victoire; 
	private $defaite;
	private $db;

	public function __construct(mysqli &$db){
		$this->db = $db;

	}

	public function getAll(){
		$sql = "SELECT 
					`id`,
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
        		FROM 
        			`personnages` 
        		WHERE 
        			`pseudo`='".$_SESSION['pseudo']."'";

        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        
	}

}
