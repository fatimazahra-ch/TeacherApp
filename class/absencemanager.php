<?php
class absencemanager{
    private $conn;
    
    
    public function setDb(PDO $conn)
    {
        $this->conn=$conn;
    }
    
    public function __construct($conn)
    {
        $this->setDb($conn);
    }
    public function nombre_absence($id_etudiant,$id_module){
    	$sqlselect="SELECT Nombre_absence FROM absence WHERE Id_etudiant='".$id_etudiant."' AND Id_module='".$id_module."'";
    	$result=$this->conn->query($sqlselect);
    	$donnees=$result->fetch();

    	$nb=$donnees['Nombre_absence'];
    	return $nb;
    }
    public function modifie_absence($id_etudiant,$id_module){
        $nb=$this->nombre_absence($id_etudiant,$id_module);
        $nb=$nb+1;
    	$sqlmod="UPDATE absence SET Nombre_absence='".$nb."' WHERE Id_etudiant='".$id_etudiant."' AND Id_module='".$id_module."'";
    	$res=$this->conn->exec($sqlmod);
         if($res)
                return true;
            else
            return false;
    }
    public function affich_absence($id_module){
    	$sqlselect="SELECT Id_etudiant FROM absence WHERE Id_module='".$id_module."'";
    	$result=$this->conn->query($sqlselect);;

    	return $result;
    }
}