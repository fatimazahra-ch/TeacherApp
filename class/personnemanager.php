<?php 
require_once('personne.php');
class personnemanager
{
    private $conn;
    public function __construct($conn)
    {
        $this->setDb($conn);
    }
    public function setDb(PDO $conn)
    {
        $this->conn=$conn;
    }
    public function add(Personne $perso)/**********/
    {
        $sqlinsert="INSERT INTO Personne(Id_personne,Nom_personne,Prenom_personne,Adr_mail,Role_personne,login_personne,password_personne";
        VALUES('".$perso->getNom()."','".$perso->getPrenom()."','".$perso->getmail()."','"$perso->getrole."','"$perso->getlogin."','"$perso->getpassword."');
        return $this->conn->exec($sqlinsert);
    }
    public function getPersonne_ByID($Id)
    {
        $result=$this->conn->query('SELECT Id_personne,Nom_personne,Prenom_personne,Adr_mail,Role_personne,login_personne,password_personne FROM Personne WHERE Id_personne='.$Id);
        $donnees=$result->fetch(PDO::FETCH_ASSOC);
        return new Personne($donnees);
    }
    public function getPersonnes()
    {
        $perso=[];
        $result=$this->conn->query('SELECT Id_personne,Nom_personne,Prenom_personne,Adr_mail,Role_personne,login_personne,password_personne FROM Personne ORDERBY Nom_personne' );
        while($donnees=$result->fetch(PDO::FETCH_ASSOC))
        {
            $persos[]=new Personne($donnees);
        }
        return $persos;
    }
    public function updatePersonne(Personne $perso)
    {
        $sqlupdate="UPDATE Personne SET Nom_personne='".$perso->getNom()."',Prenom_personne='".$perso->getPrenom()."',Adr_mail='".$perso->getmail()."',Role_personne='".$perso->getrole()."',login_personne='".$perso->getlogin()."',password_personne='".$perso->getpassword()."' WHERE Id_personne='".$perso->getId()."'";
    
    return $this->conn->exec($sqlupdate);
    }
    public function get_id($pass){
        $requete = $this->conn->query("SELECT Id_personne FROM personne WHERE Password_personne = '".$pass."'");
        $res = $requete->fetch();/*car $res est un tableau*/
        
        $id=$res['Id_personne'];
        return $id;
    }
}