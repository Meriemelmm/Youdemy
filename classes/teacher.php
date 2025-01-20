<?php
require'../classes/user.php';
class teacher extends user{

public function __construct() {
   parent:: __construct() ;
}
// public function ListeInscrit($teacherid){
//     try{
//          $inscrit_in= $this->db->prepare(" SELECT  cours.cours_id,cours.cours_title,users.username,users.email FROM 
//    inscrit_etudiant  JOIN cours ON cours.cours_id = inscrit_etudiant.cours_id 
//    JOIN  users ON   users.user_id=inscrit_etudiant.etudiant_id
//      WHERE users.user_id=:teacherid GROUP BY cours.cours_title
//    ") ;
//    $inscrit_in->execute([':teacherid'=>$teacherid]);
//    return   $inscrit_in->fetchALL(PDO::FETCH_ASSOC);
//     }
//     catch(PDOException $e){
//         return " erreur".$e->getMessage();
//     }
  
// }
public function ListeInscrit($teacherid) {
    try {
        $inscrit_in = $this->db->prepare(" 
            SELECT cours.cours_id, cours.cours_title, users.username, users.email
            FROM inscrit_etudiant
            JOIN cours ON cours.cours_id = inscrit_etudiant.cours_id
            JOIN users ON users.user_id = inscrit_etudiant.etudiant_id
            WHERE inscrit_etudiant.teacher_id = :teacherid 
            GROUP BY cours.cours_title
        ");
        $inscrit_in->execute([':teacherid' => $teacherid]);
        $result = $inscrit_in->fetchAll(PDO::FETCH_ASSOC);

        
        if(empty($result)) {
            echo "Aucun résultat trouvé pour l'ID enseignant: " . $teacherid;
        }
        
        return $result;
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        return [];
    }
}













}













?>