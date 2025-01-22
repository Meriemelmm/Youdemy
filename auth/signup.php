
<?php
require'../classes/user.php';
$user= new user();
    $user->insertAdmin();

try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['signup'])&&  isset($_POST['password']) && isset($_POST
        
  ['email'] )&& isset($_POST['username'])&&isset($_POST['roles'])){
       
       $username= $_POST['username'];
       $email= $_POST['email'];
       $password= $_POST['password'];
       $role= $_POST['roles'];
         echo $user->signUp( $username,$email,$password,$role);
         header("location:../auth/login.php");
        



    }
}
}
catch(PDOException $e){
    return "erreur".$e->getMessage();
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>* {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
 
    body {
        font-family: 'Arial', sans-serif;
        background-color:#CBDCEB;
        color: #333;
    }
    
    .container {
        width: 80%;
        margin: 0 auto;
    }
    
    
        /* Style du main */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        
        .form-container h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .input-group {
            margin-bottom: 15px;
        }
        
        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
       
        
        button {
            width: 100%;
            padding: 12px;
            background-color:      #133E87;
            background-color: #2c3e50;
            
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #f26b38;
        }
      </style>
</head>
<body>
  
    <main>
        <section class="form-container">
            <h2>Inscription</h2>
            <form action="signup.php" method="POST">
                <div class="input-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" value="" >
                    <div class="erreur" style="color:red"></div>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" value="">
                    <div class="erreur" style=" color:red"></div>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password"  >
                    <div class="erreur" style="color:red"></div>
                </div>
                
                    <label for="password">role</label><div class="input-group">
                    <select name="roles" id="" style="width:100%;heighth:50px;padding:10px">
                        <option value="teacher"> teacher</option>
                        <option value="etudiant"> etudiant</option>
                    </select>

                    

                  
                </div>
                <button type="submit" name="signup">S'inscrire</button>
                <a href="../auth/login.php" style=""> login in</a>
            </form>
        </section>
    </main>



</body>
</html>

