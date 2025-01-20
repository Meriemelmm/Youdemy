<?php


require'../classes/user.php';


 class Etudiant extends user{

public function __construct() {
     parent:: __construct();

}
public function inscriptionCourses($userid, $coursid, $teacherid) {
    
    $inscrit = $this->db->prepare("SELECT * FROM users WHERE user_id = :userid AND role = 'Etudiant'");
    $inscrit->execute([':userid' => $userid]);
    $Etudiant = $inscrit->fetch(PDO::FETCH_ASSOC);


    if (!$Etudiant) {
        header("location:../auth/signup.php");
        exit; 
    } else {
        
        $liste_Inscrit = $this->db->prepare("SELECT * FROM inscrit_etudiant WHERE etudiant_id = :etudiantid AND cours_id = :coursid");
        $liste_Inscrit->bindParam(':etudiantid', $userid);
        $liste_Inscrit->bindParam(':coursid', $coursid);
        $liste_Inscrit->execute();
        $inscriptions = $liste_Inscrit->fetchAll(PDO::FETCH_ASSOC);

      
        if (count($inscriptions) > 0) {
            echo "Vous êtes déjà inscrit à ce cours.";
        } else {
          
            $Etudiants_inscrit = $this->db->prepare("INSERT INTO inscrit_etudiant (etudiant_id, cours_id, teacher_id)
             VALUES (:etudiantid, :coursid, :teacherid)");

            $Etudiants_inscrit->bindParam(':etudiantid', $userid);
            $Etudiants_inscrit->bindParam(':coursid', $coursid);
            $Etudiants_inscrit->bindParam(':teacherid', $teacherid);

            if ($Etudiants_inscrit->execute()) {
                echo "Inscription réussie !";
            } else {
               return false;
            }
        }
    }
}

   





public function MesCourses($etudiantid){
$mesCourses=$this->db->prepare("SELECT cours.cours_title,cours.cours_description ,cours.cours_id,users.user_id 
FROM inscrit_etudiant JOIN cours ON cours.cours_id=inscrit_etudiant.cours_id 
JOIN users ON users.user_id=inscrit_etudiant.etudiant_id WHERE users.user_id=:etudiantid
");
$mesCourses->execute(['etudiantid'=>$etudiantid]);
return  $mesCourses->fetchALL(PDO::FETCH_ASSOC);


}}








?>