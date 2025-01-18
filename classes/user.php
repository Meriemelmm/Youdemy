<?php

require_once'../classes/database.php';
session_start();
class user {
    private $id;
private $username;
private $email;
private $password;
private $role;
private $status;
protected $db;


public function __construct() {
   $this->db=(new database())->getconnect();
       

}
// gttrs
public function getusername(){  return $this->username;}
public function getemaill(){  return $this->email;}
public function getpassword(){  return $this->password;}
public function gtrole(){  return $this->role;}
public function getstatus(){  return $this->status;}
//  sign up 
public function signUp($username,$email,$password,$role){

    try{

        $passwordhash= password_hash($password, PASSWORD_DEFAULT);
        $data=[':username'=>$username,
        ':email'=>$email,':password'=>$passwordhash,
        ':role'=>$role];

        $us= $this->db-> prepare("SELECT *FROM users  WHERE email=:email");
        $us->execute([':email'=>$email]);
        $result=$us->fetchAll(PDO::FETCH_ASSOC);
        if(!empty( $result)){
            return "already exist this email";



        }

        $user="INSERT INTO users (username,email,password,role) VALUES(:username,:email,:password,:role)";
        $userInsrt=$this->db->prepare($user);
        return $userInsrt->execute($data);


        
    }catch(PDOException $e){
        return " erreur".$e->getMessage();
    }


}
// add admin's informations:
public function insertAdmin(){
    try{
        $passwordhash= password_hash("rachida2024", PASSWORD_DEFAULT);
        $data=[':username'=>"rachida",
        ':email'=>"rachidarady@gmail.com",':password'=>$passwordhash,':role'=>"admin"];
        $admin=$this->db->prepare("INSERT INTO users (username,email,password,role) VaLUES(:username,:email,:password,:role)");
        return $admin->execute($data);


    }
    catch(PDOException $e){
        return "erreur".$e->getMessage();

    }
}

public function login($email, $password){
    try {
   
        $users = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $users->bindParam(':email', $email);
        $users->execute();

       
        $user = $users->fetch(PDO::FETCH_ASSOC);

      
        if ($user) {
            
            if (password_verify($password, $user['password'])) {
                $this->id = $user['user_id'];
                $this->email = $user['email'];
                $this->username = $user['username'];
                $this->role = $user['role'];
                $this->status = $user['status'];
              
    
                $_SESSION['user_id'] = $this->id;
                $_SESSION['username'] = $this->username;
                $_SESSION['role'] = $this->role;
                switch ($user['role']) {
                    case 'admin':
                        header("Location: ../admin/boardAd.php?user_id=" );

                        exit();
                    case 'teacher':
                        header("Location: ../teacher/add.php");
                        exit();
                    case 'Etudiant':
                        echo "Vous êtes un étudiant.";
                        exit();
                    default:
                        echo "Rôle inconnu.";
                        break;
                }
            } else {
               
                return "Mot de passe incorrect.";
            }
        } else {
          
            return "Email non trouvé.";
        }

    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}




}





 











?>