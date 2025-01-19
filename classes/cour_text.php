<?php 
include_once '../classes/cour.php';
include_once '../classes/tag_course.php';
class text_cour extends course{
    private $content;
    public function __construct() {
         parent::  __construct() ;
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
            ':teacherid' => $teacherid,
            ':content' => $content
        ];
    
        $cour = $this->db->prepare("INSERT INTO cours(category_id,cours_title, cours_description, teacher_id, text_content)
                                          VALUES (:categorieid,:title,:description,:teacherid,:content)");
    
        $cour->execute($data);  
        $coursd = $this->db->lastInsertId();
        $this->courdid=$_SESSION['cours_id']= $coursd;
    
       
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
//    afiche text_cour
public function showCour($teacherId=NULL){
    try{$data=[':teacherid'=>$teacherId];
    $cours=$this->db->prepare("SELECT cours.cours_title,cours.cours_id,cours.cours_description,cours.text_content,
    cours.vedio_content,categories.categorie_id,users.user_id,categories.categorie_name FROM cours
    JOIN categories ON categories.categorie_id=cours.category_id JOIN users ON
     cours.teacher_id=users.user_id WHERE cours.teacher_id=:teacherid AND cours.vedio_content IS NULL");
    $cours->execute($data);
    return $cours->fetchALL(PDO::FETCH_ASSOC);

    }
    catch( PDOException $e){
        echo" erruer ".$e->getMessage();
    }
    
 
 }




public function UpdateCourse($title, $description, $categorieid, $content, $coursid, $tags) {
    try {
       
        $data = [
            ':title' => $title,
            ':description' => $description,
            ':categoryid' => $categorieid,
            ':content' => $content,
            ':coursid' => $coursid
        ];

        $Update = $this->db->prepare("UPDATE cours 
                                      SET cours_title = :title, 
                                          cours_description = :description, 
                                          category_id = :categoryid, 
                                          text_content = :content 
                                      WHERE cours_id = :coursid");
        $Update->execute($data);

      
        $tagsDB = $this->db->prepare("SELECT tag_id FROM tag_course WHERE cours_id = :coursid");
        $tagsDB->execute([':coursid' => $coursid]);
        $tagsanc = $tagsDB->fetchAll(PDO::FETCH_ASSOC);

        $existeTagIds = array_column($tagsanc, 'tag_id'); 

       
        $tagsremove = array_diff($existeTagIds, $tags);
        foreach ($tagsremove as $tagid) {
            $removetagsdb = $this->db->prepare("DELETE   FROM tag_course WHERE cours_id = :coursid AND tag_id = :tagid");
            $removetagsdb->execute([':coursid' => $coursid, ':tagid' => $tagid]);
        }

        
        $tagsAdd = array_diff($tags, $existeTagIds);
        foreach ($tagsAdd as $tag) {
            $updateTags = $this->db->prepare("INSERT INTO tag_course (tag_id, cours_id) VALUES (:tagid, :coursid)");
            $updateTags->execute([':tagid' => $tag, ':coursid' => $coursid]);
        }

        return true; 
    } catch (PDOException $e) {
       
        return "Erreur: " . $e->getMessage();
    }
}



    }



?>
