 <?php
                  
       require('../classes/teacher.php');  
       if (!isset($_SESSION['username'])) {
        header('Location: ../auth/login.php');
        exit();
    }
    
                  ?>
                  
                  
                  
                  
                  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styleee.css">
   <link rel="stylesheet" href="../styles.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
   <style></style>
</head>
<body>
    
<?php include '../side/sidebarTeacher.php';?>
    
    
    
    <main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Liste des etudiants</h2>
                <p class="subtitle">Gestion des </p>
            </div>
            <div class="search-bar">
                <input type="text" placeholder= "     Rechercher un utilisateur..." class="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
       
       
 <h2> </h2>
        <div class="user-table">
            <table>
                <thead>
                    <tr> <th>titre de cours </th>
                        <th>username</th>
                        <th>email</th>
                        
                    </tr>
                </thead>
                <tbody>
                 <?php    $teacher=new teacher();
         $teacherid=$_SESSION['user_id'];
        
        
        $etudiants=$teacher->ListeInscrit($teacherid) ; 
        
       
        foreach( $etudiants as $etudiant) :?>
                    <tr>
                    <td><?php echo htmlspecialchars($etudiant['cours_title']);?> </td>
                        <td><?php echo htmlspecialchars($etudiant['username']);?> </td>
                        <td><?php echo htmlspecialchars($etudiant['email']);?> </td>
                      
                       
                    </tr>
                     <?php endforeach;?>
                </tbody>
            </table>
        </div>

      
    </div>
</main>


</body>
</html>