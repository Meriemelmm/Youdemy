<?php 
include_once '../classes/cour.php';
class cour_vedio extends course{
    private $content;
    public function __construct() {
         parent::  __construct() ;
    }

public function addCour($Categorieid, $title, $content, $description, $teacherid, $tags) {
   
    $data = [
        ':categorieid' => $Categorieid,
        ':title' => $title,
        ':description' => $description,
        ':teacherid' => $teacherid,
        ':content' => $content
    ];

    $cour= $this->db->prepare("INSERT INTO cours (category_id, cours_title, cours_description, teacher_id, vedio_content)
                                      VALUES (:categorieid, :title, :description, :teacherid, :content)");

    $cour->execute($data);  
    $coursd = $this->db->lastInsertId();  

   
    foreach ($tags as $tagid) {
        $tag = $this->db->prepare("INSERT INTO tag_course (tag_id, cours_id) VALUES (:tagid,:coursid)");
        $tag->execute([":tagid" => $tagid,":coursid" => $coursd]);  
    }
}
// show vedio_cour
public function showCour($teacherId){
    try{$data=[':teacherid'=>$teacherId];
    $cours=$this->db->prepare("SELECT cours.cours_title,cours.cours_id,cours.cours_description,cours.text_content,
    cours.vedio_content,categories.categorie_id,users.user_id,categories.categorie_name FROM cours
    JOIN categories ON categories.categorie_id=cours.category_id JOIN users ON
     cours.teacher_id=users.user_id WHERE cours.teacher_id=:teacherid AND cours.text_content IS NULL");
    $cours->execute($data);
    return $cours->fetchALL(PDO::FETCH_ASSOC);

    }
    catch( PDOException $e){
        echo" erruer ".$e->getMessage();
    }
    
 
 }
}

   

?>