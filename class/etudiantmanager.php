<?php
class etudiantmanager{
	private $conn;

	public function setDb($conn){
		$this->conn=$conn;
	}
	public function __construct($conn){
		$this->setDb($conn);
	}
	public function get_liste_etudiant(){
		$req="SELECT * FROM etudiant";
		$result=$this->conn->query($req);
		return $result;
	}
}
?>