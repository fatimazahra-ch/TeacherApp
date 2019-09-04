<?php
class user extends database{
    
    public function getuser($username,$password) {
        $sql="SELECT * FROM personne
     where login_personne='$username' and Password_personne='$password'";
        $result = $this->connect()->query($sql);
        $array = $result->fetchALL();
        $numRows = count($array);/*pour retourner le nombredes lignes dans la requete*/
        if($numRows == 1){
            return  true;
        }
        else
            return  false;
    }
}
?>