<?php

require_once '../classes/database.php';
class course
{
   private  $course_id;
   private $title;
   private $description;
   private $content;
   private $categorieid;
   private $tags = [];
   protected $db;


   public function __construct()
   {
      $this->db =  (new database)->getconnect();
   }
   

   
   public function setTitle($title) {
       $this->title = $title;
   }
   
   public function getTitle() {
       return $this->title;
   }
   
   public function setDescription($description) {
       $this->description = $description;
   }
   
   public function getDescription() {
       return $this->description;
   }
   
   public function setCategorieId($categorieid) {
       $this->categorieid = $categorieid;
   }
   
   public function getCategorieId() {
       return $this->categorieid;
   }
   
   public function setTags($tags) {
       $this->tags = $tags;
   }
   
   public function getTags() {
       return $this->tags;
   }
   

   public function addCour($Categorieid, $title, $content, $description, $teacherid, $tags)
   {

      $user = $this->db->prepare("SELECT compte_status FROM users WHERE user_id=:teacherid");
      $user->execute([":teacherid" => $teacherid]);
      $teacher = $user->fetch();

      if ($teacher['compte_status'] === 'accepted') {
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
      } else {
         return false;
      }
   }
   // afiche 
   public function showCour($teacherId = NULL)
   {
      try {
         $cours = $this->db->prepare("SELECT cours.cours_title,cours.cours_id,cours.cours_description,cours.text_content,
   cours.vedio_content,categories.categorie_id,users.user_id,categories.categorie_name,users.username FROM cours
   JOIN categories ON categories.categorie_id=cours.category_id JOIN users ON
    cours.teacher_id=users.user_id WHERE cours.vedio_content IS NULL OR  cours.text_content IS NULL");
         $cours->execute();
         return $cours->fetchALL(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
         echo " erruer " . $e->getMessage();
      }
   }
   //  removeCour
   public function removeCour($coursid)
   {


      try {
         $remove = $this->db->prepare("DELETE  FROM cours WHERE cours_id=:coursid");
         return $remove->execute([":coursid" => $coursid]);
      } catch (PDOException $e) {
         return " ereur" . $e->getMessage();
      }
   }
   public function getCourseid($courseid)
   {
      try {
         $course = $this->db->prepare("SELECT *FROM cours WHERE cours_id = :courseid");
         $course->execute([':courseid' => $courseid]);
         return $result = $course->fetchALL();
      } catch (PDOException $e) {
         return " erruer" . $e->getMessage();
      }
   }
   public function gettedCourse($courseid)
   {
      try {
         $course = $this->db->prepare("SELECT  cours.cours_title,cours.cours_description,
       categories.categorie_id,categories.categorie_name, cours.text_content,cours.vedio_content,
       users.user_id,users.username FROM cours JOIN categories  ON categories.categorie_id=cours.category_id 
       JOIN users ON users.user_id=cours.teacher_id  WHERE cours_id = :courseid");
         $course->execute([':courseid' => $courseid]);
         return $result = $course->fetchALL();
      } catch (PDOException $e) {
         return " erruer" . $e->getMessage();
      }
   }
   public function coursepagination($index, $search)
   {
      $info[] = [];
      $limit = 2;
      $offset = $limit * ($index - 1);

      $sql = "SELECT cours.cours_title, cours.cours_description, cours.cours_id, categories.categorie_id,categories.categorie_name ,users.username,users.user_id
      FROM cours 
      JOIN categories ON categories.categorie_id = cours.category_id  JOIN  users ON users.user_id=cours.teacher_id
      WHERE cours.cours_title LIKE :search
      LIMIT $limit OFFSET $offset";

      $courses = $this->db->prepare($sql);
      $courses->bindParam(':search', $search, PDO::PARAM_STR);
      $courses->execute();
      $info["courses"] = $courses->fetchAll(PDO::FETCH_ASSOC);

      $total_cours = $this->db->prepare("SELECT COUNT(cours_id) AS total_cours FROM cours WHERE cours_title LIKE :search");
      $total_cours->bindParam(':search', $search, PDO::PARAM_STR);
      $total_cours->execute();
      $total_cours = $total_cours->fetch();

      $info["total_pages"] = ceil((int)$total_cours["total_cours"] / $limit);

      return $info;
   }
   public  function totalPages($index, $search){
      $limit=2;
      $total_course=$this->db->prepare("SELECT COUNT(cours_id) AS total_cours FROM cours WHERE cours_title LIKE :search");
      $total_course->execute();
      $total_course=$total_course->fetch();
      $total_pages=ceil($total_course['total_cours']/ $limit);

   }
}
