<?php
 require_once'../classes/database.php';
 class paginator {
private $conn;
private $query;
public function __construct() {
    $this->conn=(new database())->getconnect();
      $this->query="SELECT * FROM cours";  
 
 }




 }









?>