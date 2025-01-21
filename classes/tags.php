<?php
 require_once'../classes/database.php';
class tags{
private $db;
public function __construct() {
    $this->db=(new database())->getconnect();
}

public function showTags(){
    try{
        $showTags=$this->db->prepare("SELECT * FROM tags");
        $showTags->execute();
        return $tags=$showTags->fetchALL(PDO::FETCH_ASSOC);

    }
    catch(PDOException $e){
        echo" erruer".$e->getMessage();
    }
}

}















?>