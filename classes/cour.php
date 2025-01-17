<?php

require_once'../classes/database.php';
class course {
private  $gameid;
private $tile;
private $description;
private $content;
private $categorieid;
 private $tags=[];
 protected $db;


 public function __construct() {
    $this->db =  (new database)->getconnect();
 }


 public function addCour($tagid,$tagCategorie,$tile,$content,$description,$teacherid){





    

 }





}















?>