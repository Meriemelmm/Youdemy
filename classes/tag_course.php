<?php
require_once'../classes/database.php';

class tag_course{
    private $tagid;
    private $courid;
     private $db;

     public function __construct() {
        $this->db = (new database)->getconnect();
     }
     public function tags_course($coursid){


        $tag=$this->db->prepare("SELECT tags.tag_id,cours.cours_id ,tags.tag_name FROM tag_course 
        JOIN tags ON tags.tag_id=tag_course.tag_id 
        JOIN cours ON cours.cours_id=tag_course.cours_id WHERE cours.cours_id=:coursid");
        $tag->execute([':coursid'=>$coursid]);
        return $tag->fetchALL(PDO::FETCH_ASSOC);}
}?>