<?php

function connexion_header($parametre){
    include_once($parametre.".inc.php");
    $mysql = "mysql:host=".host.";dbname=".db.";charset=utf8";
    try{
        $conne = new PDO($mysql,user,password); 
        $conne->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conne;
    }
    catch (PDOException $e)
    {
        echo "Connection failed" .$e->getMessage();
          
    }
}
