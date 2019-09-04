 <?php
 	class note{
 		private $Id_note;
 		private $Valeur_finale;
 		private $Valeur_apres_rat;
 		private $Id_module;
 		private $Id_etudiant;
 	}

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
    
    public function getId_note(){
        return $this->Id_note;
    }
    public function getValeur_finale(){
        return $this->Valeur_finale;
    }
    public function getValeur_apres_rat(){
        return $this->Valeur_apres_rat;
    }
    public function getId_module(){
        return $this->Id_module;
    }
    public function getId_etudiant(){
        return $this->Id_etudiant;
    }
    
    public function setId_note($Id_note){$this->Id_note=$Id_note;}
    public function setValeur_finale($val){$this->Valeur_finale=$val;}
    public function setValeur_apres_rat($val){$this->Valeur_apres_rat=$val;}
    public function setId_module($id){$this->Id_module=$id;}
    public function setId_etudiant($id){$this->Id_etudiant=$id;}
}
 ?>