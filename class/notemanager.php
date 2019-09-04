<?php
	class notemanager{
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
    public function get_note_finale($Id_etudiant,$Id_module){
        $sqlselect="SELECT Valeur_finale FROM note WHERE (Id_etudiant='".$Id_etudiant."' AND Id_module='".$Id_module."')";
        $result=$this->conn->query($sqlselect);
        return $result;
    }
    public function get_note_rat($Id_etudiant,$Id_module){
        $sqlselect="SELECT Valeur_apres_rat FROM note WHERE (Id_etudiant='".$Id_etudiant."' AND Id_module='".$Id_module."')";
        $result=$this->conn->query($sqlselect);
        return $result;
    }
    public function set_note_finale($finale,$Id_etudiant,$Id_module){
        if($finale!=0){
            $sqlup="UPDATE note SET Valeur_finale='".$finale."' WHERE (Id_etudiant='".$Id_etudiant."' AND  Id_module='".$Id_module."')";
        }
        else{
            $ress=$this->get_note_finale($Id_etudiant,$Id_module);
            $don=$ress->fetch();
            $n=$don['Valeur_finale'];
            $sqlup="UPDATE note SET Valeur_finale='".$n."' WHERE (Id_etudiant='".$Id_etudiant."' AND  Id_module='".$Id_module."')";
        }
            $res=$this->conn->exec($sqlup);
            if($res)
                return true;
            else
            return false;
    }
    public function set_note_rat($rat,$Id_etudiant,$Id_module){
         if($rat!=0){
            $sqlup="UPDATE note SET Valeur_apres_rat='".$rat."' WHERE (Id_etudiant='".$Id_etudiant."' AND  Id_module='".$Id_module."')";
        }
        else{
            $ress=$this->get_note_rat($Id_etudiant,$Id_module);
            $don=$ress->fetch();
            $n=$don['Valeur_apres_rat'];
            $sqlup="UPDATE note SET Valeur_apres_rat='".$n."' WHERE (Id_etudiant='".$Id_etudiant."' AND  Id_module='".$Id_module."')";
        }
            $res=$this->conn->exec($sqlup);
            if($res)
                return true;
            else 
                return false;
    }
	}
?>