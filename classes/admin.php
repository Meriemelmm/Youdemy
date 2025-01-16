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
}



?>