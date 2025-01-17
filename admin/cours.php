<?php 
 require '../classes/user.php';
 if (!isset($_SESSION['username'])) {
     header('Location: ../auth/login.php');
     exit();
 }?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include '../side/sideAdmin.php';?>


<main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Gérer cours</h2>
                <p class="subtitle">Liste cours</p>
            </div>
           
        </div>

        <div class="courses-table">
            <table>
                <thead>
                    <tr>
                        <th>titre de cours</th>
                        <th>categrie</th>
                        <th>tags</th>
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                   
                    <tr>
                        <td>
                            python 
                        </td>
                        <td>Programmation</td>
                        <td>Python, Débutant, Algorithmie</td>
               
                        <td class="actions">
                      
                
                    
                        <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                <input type="hidden" name="user_id" value="">
                                <button  style="background:transparent;border:none"type="submit" name="delete" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                               
                          
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</main>



























</body>
</html>