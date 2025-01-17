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

        
        public function bancompte($status,$userid){
            try{
                $data=[':status'=>$status,':userid'=>$userid];
    
           $status=$this->db->prepare("UPDATE users  SET status=:status WHERE  user_id=:userid ") ;
           return $status->execute($data);
    
            }
            catch(PDOException $e){
                return "erreur".$e->getMessage();
            }
            
        }
        public function addtasg($tagname){
            try{
                 $tags=$this->db->prepare("INSERT INTO tags (tag_name) VALUE(:name)");
            return $tags->execute([':name'=>$tagname]);
            }
            catch(PDOException $e){
                return " erreur".$e->getMessage();
            }
           
        }
        public function showTags(){
            try{
                $showTags=$this->db->prepare("SELECT * FROM tags");
                $showTags->execute();
                return $tags=$showTags->fetchALL(PDO::FETCH_ASSOC);

            }
            catch(PDOException $e){
                echo" erruer".$e->getMessage();
            }
        }
        public function removeTags($tagid){

 $remove=$this->db->prepare("DELETE FROM tags WHERE tag_id=:tagid");
 return $remove->execute([':tagid'=>$tagid]);
 

            }
             public function addCategorie( $categoriename){
                $categories=$this->db->prepare("INSERT into categories (categorie_name) VALUE(:catgeoriename )");
               return $categories->execute([':catgeoriename'=>$categoriename]);

             }
             public function showCategorie(){
                $categories=$this->db->prepare("SELECT * FROM categories ");
                $categories->execute();
                return $categories->fetchALL(PDO::FETCH_ASSOC);
             }
             public function removeCategorie($categorieid){

                try{
                     $remove=$this->db->prepare("DELETE FROM categories WHERE categorie_id=:categorieid");
                return $remove->execute([':categorieid'=>$categorieid]);
                
                }
                catch(PDOException $e ){
                    echo " erreur".$e->getMessage();
                }

               
               
                           }

        }




?>