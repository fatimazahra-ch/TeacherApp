<?php
class moduleManager{
    private $conn;
    
    
    public function setDb(PDO $conn)
    {
        $this->conn=$conn;
    }
    
    public function __construct($conn)
    {
        $this->setDb($conn);
    }
    
    public function moduleEnseign($id)
    {
        $sqlsele="SELECT Id_module,Intitulé FROM module WHERE Id_personne='".$id."'";
        $result=$this->conn->query($sqlsele);
        return $result;
    }
    
    public function module_responsable($id)
    {
        $sqlsele="SELECT Id_module,Intitulé FROM module WHERE Idresponsable='".$id."'";
        $result=$this->conn->query($sqlsele);
        return $result;
    }
    public function liste_module($id)
    {
        $sqlsele="SELECT Intitulé FROM module WHERE Id_personne='".$id."'";
        $result=$this->conn->query($sqlsele);
        return $result;
    }
    public function get_idmodule($intitule){
        $sqlsele="SELECT Id_module FROM module WHERE Intitulé='".$intitule."'";
        $result=$this->conn->query($sqlsele);
        $res = $result->fetch();/*car $res est un tableau*/
        $id=$res['Id_module'];
        return $id;
    }
}
?>