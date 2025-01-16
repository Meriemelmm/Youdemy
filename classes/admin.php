<?php
require'../classes/user.php';
class admin extends user{
private $data;

public function __construct() {
    parent:: __construct() ;
   
}


public function showTeachers(){
    try{
        
         $teachers=$this->db->prepare("SELECT *FROM  users WHERE role='teacher' and compte_status='pending'");
            $teachers->execute();
            return $teachers->fetchALL(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return" erreur".$e->getMessage();
    }
           
        }
        public function validatedCompte($status,$userid){
            try{
                $data=[':status'=>$status,':userid'=>$userid];
    
           $status=$this->db->prepare("UPDATE users  SET compte_status=:status WHERE  user_id=:userid ") ;
           return $status->execute($data);
    
            }
            catch(PDOException $e){
                return "erreur".$e->getMessage();
            }
            
        }
        public function showUsers(){
            try{
                  $users=$this->db->prepare("SELECT *FROM users WHERE  role='Etudiant 'OR role='teacher'");
            $users->execute();
            return $users->fetchALL(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e){
                return "erreur".$e->getMessage();
            }
          
            
        }
        public function removeUser($userid){
            try{
                $user=$this->db->prepare("DELETE  FROM users WHERE user_id=:userid");
               return $user->execute([':userid'=>$userid]);  
            }
catch(PDOException $e){
    return "erreur".$e->getMessage();
}
        }
}



?>