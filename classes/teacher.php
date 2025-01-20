<?php
require'../classes/user.php';
class teacher extends user{

public function __construct() {
   parent:: __construct() ;
}

public function ListeInscrit($teacherid) {
    try {
        $inscrit_in = $this->db->prepare(" 
          SELECT cours.cours_id, cours.cours_title,users.username,users.email
FROM inscrit_etudiant
JOIN cours ON cours.cours_id = inscrit_etudiant.cours_id
JOIN users ON users.user_id = inscrit_etudiant.etudiant_id
WHERE inscrit_etudiant.teacher_id = :teacherid;


           
        ");
        
        $inscrit_in->execute([':teacherid' => $teacherid]);
        $result = $inscrit_in->fetchAll(PDO::FETCH_ASSOC);

        
        
        
        
        return $result;
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        return [];
    }
}



//  statistiques 
public function CountCourses($teacherid){
    try{
         $count = $this->db->prepare("SELECT COUNT(cours_id) AS nb_course 
    FROM cours 
    WHERE teacher_id = :teacherid");

 
 $count->execute([':teacherid' => $teacherid]); 
  $nb_course=$count->fetch();
   return $nb_course['nb_course'];
 
     
    }
    catch(PDOException $e){
        echo "erreur".$e->getMessage();
    }
   
    

}
public function  NB_inscrit($teacherid){
    try{
    $count = $this->db->prepare("SELECT COUNT(inscrit_id) AS nb_inscrit 
    FROM inscrit_etudiant 
    WHERE teacher_id = :teacherid");

 
 $count->execute([':teacherid' => $teacherid]); 
  $nb_course=$count->fetch();
   return $nb_course['nb_inscrit'];
 
     
    }
    catch(PDOException $e){
        echo "erreur".$e->getMessage();
    }


}
public function inscrit_par_course($teacherid){

    try{
        $count = $this->db->prepare("SELECT  cours.cours_title,COUNT(inscrit_id) AS nb_inscrit 
        FROM inscrit_etudiant JOIN cours ON inscrit_etudiant.cours_id=cours.cours_id 
        WHERE inscrit_etudiant.teacher_id = :teacherid GROUP BY cours.cours_title");
    
     
     $count->execute([':teacherid' => $teacherid]); 
       return $nb_course=$count->fetchAll( PDO::FETCH_ASSOC);
      
     
         
        }
        catch(PDOException $e){
            echo "erreur".$e->getMessage();
        }
    
    
}












}













?>