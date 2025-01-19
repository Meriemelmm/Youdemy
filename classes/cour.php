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


 public function addCour($Categorieid, $title, $content, $description, $teacherid, $tags) {
       
     $user=$this->db->prepare("SELECT compte_status FROM users WHERE user_id=:teacherid");
     $user->execute([":teacherid"=>$teacherid]);
     $teacher=$user->fetch();

     if($teacher['compte_status']==='accepted'){
       $data = [
      ':categorieid' => $Categorieid,
      ':title' => $title,
      ':description' => $description,
      ':teacherid' => $teacherid
     
  ];

  $cour = $this->db->prepare("INSERT INTO cours (category_id, cours_title, cours_description, teacher_id, text_content)
                                    VALUES (:categorieid, :title, :description, :teacherid)");

  $cour->execute($data);  
  $coursd = $this->db->lastInsertId();  

 
  foreach ($tags as $tagid) {
      $tag = $this->db->prepare("INSERT INTO tag_course (tag_id, cours_id) VALUES (:tagid, :coursid)");
      $tag->execute([":tagid" => $tagid, ":coursid" => $coursd]);  
  }
  return true;
     }
     else {
      return false ;
     }
  
  
   
}
// afiche 
public function showCour($teacherId= NULL){
   try{
   $cours=$this->db->prepare("SELECT cours.cours_title,cours.cours_id,cours.cours_description,cours.text_content,
   cours.vedio_content,categories.categorie_id,users.user_id,categories.categorie_name,users.username FROM cours
   JOIN categories ON categories.categorie_id=cours.category_id JOIN users ON
    cours.teacher_id=users.user_id WHERE cours.vedio_content IS NULL OR  cours.text_content IS NULL");
   $cours->execute();
   return $cours->fetchALL(PDO::FETCH_ASSOC);

   }
   catch( PDOException $e){
       echo" erruer ".$e->getMessage();
   }
   

}
//  removeCour
public function removeCour($coursid){


   try{
   $remove= $this->db->prepare("DELETE  FROM cours WHERE cours_id=:coursid");
   return $remove->execute([":coursid"=>$coursid]);

   }
   catch(PDOException $e){
      echo " ereur".$e->getMessage();

   }

}
public function getCourseid($courseid) {
   try{
       $course = $this->db->prepare("SELECT * FROM cours WHERE cours_id = :courseid");
   $course->execute([':courseid' => $courseid]);
    return $result = $course->fetchALL();
   }
  catch(PDOException $e){
   return" erruer".$e->getMessage();

  }
   
}







}















?>