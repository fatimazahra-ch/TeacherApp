<?php
	class etudemanager {
		private $conn;
		
		public function setDb(PDO $conn)
    {
        $this->conn=$conn;
    }
    
    public function __construct($conn)
    {
        $this->setDb($conn);
    }
    public function get_liste($id){
    	$sqlsele="SELECT * FROM etudiant WHERE Id_etudiant IN (SELECT Id_etudiant FROM etude WHERE Id_module='".$id."')";
        $result=$this->conn->query($sqlsele);

       return $result;
    }
	}
?>