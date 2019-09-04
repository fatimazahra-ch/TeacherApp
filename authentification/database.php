<?php
class database{
    private $servername;
    private $User;
    private $password;
    private $dbname;
    
    public function __construct(){
        $this->servername='localhost';
        $this->User='root';
        $this->password='';
        $this->dbname='projet_web';
    }
    public function connect(){
        $conn=new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8",$this->User,$this->password);
        return  $conn;
    }
}
?>