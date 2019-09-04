<?php
class module{
    private $Id_module;
    private $Intitule;
    private $Id_responsable;
    private $Id_personne;
    
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
    
    public function getId_module(){
        return $this->Id_module;
    }
    public function getIntitule(){
        return $this->Id_module;
    }
    public function getId_responsable(){
        return $this->Id_module;
    }
    public function getId_personne(){
        return $this->Id_module;
    }
    
    public function setId_module($id){$this->Id_module=$id;}
    public function setIntitule($intitule){$this->Intitule=$intitule;}
    public function setId_responsable($resp){$this->Id_responsable=$resp;}
    public function setId_personne($pers){$this->Id_personne=$pers;}
}