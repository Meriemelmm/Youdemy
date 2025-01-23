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
public function getUsername(){  return $this->username;}
public function getEmaill(){  return $this->email;}
public function getPassword(){  return $this->password;}
public function gtRole(){  return $this->role;}
public function getStatus(){  return $this->status;}
//  sign up 
// public function signUp($username,$email,$password,$role){

//     try{  
//          if (empty($username) || empty($email) || empty($password)) {
//         return "Tous les champs doivent être remplis.";
//     }

//         $passwordhash= password_hash($password, PASSWORD_DEFAULT);
//         $data=[':username'=>$username,
//         ':email'=>$email,':password'=>$passwordhash,
//         ':role'=>$role];

//         $us= $this->db-> prepare("SELECT *FROM users  WHERE email=:email");
//         $us->execute([':email'=>$email]);
//         $result=$us->fetchAll(PDO::FETCH_ASSOC);
//         if(!empty( $result)){
//             return "already exist this email";



//         }

//         $user="INSERT INTO users (username,email,password,role) VALUES(:username,:email,:password,:role)";
//         $userInsrt=$this->db->prepare($user);
//         return $userInsrt->execute($data);


        
//     }catch(PDOException $e){
//         return " erreur".$e->getMessage();
//     }


// }

public function insertAdmin(){
    try{
        $passwordhash= password_hash("rachida2024", PASSWORD_DEFAULT);
        $data=[':username'=>"rachida",
        ':email'=>"rachidarady@gmail.com",':password'=>$passwordhash,':role'=>"admin"];
        $admin=$this->db->prepare("INSERT INTO users (username,email,password,role) VALUES(:username,:email,:password,:role)");
       
        if ($admin) {
            return $admin->execute($data);
        } else {
            die("Erreur de préparation de la requête SQL.");
        }


    }
    catch(PDOException $e){
        return "Erreur dans insertAdmin: " . $e->getMessage();

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
                        if($user['compte_status']==="accepted"){ header("Location: ../teacher/add.php");
                        exit();
                    }
                      
                         else {
                            header("location:../home/home.php");
exit();
                         }
                            
                    case 'Etudiant':
                        header("Location: ../home/home.php");
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



public function signUp($username, $email, $password, $role) {
    try {  
       
        if (empty($username) || empty($email) || empty($password)) {
            return "Tous les champs doivent être remplis.";
        }

        
        $validated_username = true;
        for ($i = 0; $i < strlen($username); $i++) {
           
            if (!((($username[$i] >= 'a' && $username[$i] <= 'z') || ($username[$i] >= 'A' && $username[$i] <= 'Z')))) {
                $validated_username = false;
                return "Le nom d'utilisateur doit contenir uniquement des lettres.";
            }
        }

        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $validated_username = false;
            return"email incoreect";

        }

        
        $us = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $us->execute([':email' => $email]);
        $result = $us->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            return "Cet email est déjà utilisé.";
        }

        
        if ($validated_username) {
           
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                ':username' => $username,
                ':email' => $email,
                ':password' => $passwordhash,
                ':role' => $role
            ];

            $userInsert = $this->db->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
            if ($userInsert->execute($data)) {
                return "Inscription réussie.";
            } else {
                return "Erreur lors de l'insertion de l'utilisateur.";
            }
        }

    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}





}





 











?>