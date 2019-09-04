<?php
class personne{
    protected $Id_personne;
    protected $Nom_personne;
    protected $Prenom_personne;
    protected $Role;
    protected $Adr_mail;
    protected $Login;
    protected $Password;
    
    public function hydrate(array $donnee){
        foreach ($donnee as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
            
        }
    }
    
    public function getId_personne(){
        return $this->Id_personne;
    }
    public function getNom_personne(){
        return $this->Nom_personne;
    }
    public function getPrenom_personne(){
        return $this->Prenom_personne;
    }
    public function getRole(){
        return $this->Role;
    }
    public function getAdr_mail(){
        return $this->Adr_mail;
    }
    public function getLogin(){
        return $this->Login;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function setId_personne($pers){$this->Id_personne=$pers;}
    public function setNom_personne($nom){$this->Nom_personne=$nom;}
    public function setPrenom_personne($prenom){$this->Prenom_personne=$prenom;}
    public function setId_Role($role){$this->Role=$role;}
    public function setAdr_mail($mail){$this->Adr_mail=$mail;}
    public function setLogin($login){$this->Login=$login;}
    public function setPassword($pass){$this->Password=$pass;}
}
?>