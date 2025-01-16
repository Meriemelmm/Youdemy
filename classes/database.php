<?php

class database{
private $db;
 private $namehost="localhost:3308";
 private  $dbname="youdemy";

 private $user="root";
 private $pass="";
public function __construct() {
   
   try{
     $this->db = new PDO("mysql:host=" .$this->namehost.";dbname=". $this->dbname,$this->user,$this->pass);
     echo" nice";
   }
   catch(PDOException $e){
    return "erreur est :" .$e->getMessage();
   }
   
}
public function getconnect(){
    
    return $this->db;
}

}










?>