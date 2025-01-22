




<?php 


// require '../classes/user.php';


require'../classes/admin.php';
if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
}
$admin= new admin();
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['ajoute']) && isset($_POST['categorie'])){
        $categoriename=$_POST['categorie'];
        try{
            $admin-> addCategorie( $categoriename);

        }
        catch(PDOException $e){
            echo "erreur".$e->getMessage();
        }
    }
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['removecat']) && isset($_POST['categorie_id'])){
        $categorieid=$_POST['categorie_id'];
        try{
    
    echo $admin-> removeCategorie($categorieid);
    
    
        }
        catch(PDOException $e){
            echo " erreur".$e->getMessage();
        }
    }}



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
    

<?php include '../side/sideAdmin.php';?>
<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="../styleee.css">
   <link rel="stylesheet" href="../styles.css">
   
   <style>
    table{ border-collapse: separate;;border-spacing: 2px;
        
        
        
       }
</style>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body >
    <div  class="content"style="dislplay:flex;">
    <?php include '../side/sideAdmin.php';?>
    
    <main class="main-content">
        <div class="content-wrapper">
            <div class="header">
                <div>
                    <h2 class="title">Ajouter une categorie</h2>
                    <p class="subtitle">Créer une nouvelle  categorie</p>
                </div>
            </div>
    
            <form action="../admin/categorie.php" method="POST" class="form-container">
                
    
                    <div class="form-item">
                        <label for="genre" class="form-label">categorie</label>
                        <input type="text" id="categorie" name="categorie" required class="form-input">
                    </div>
    
                   
    
                   
    
                    <div class="form-item full-width">
                        <button type="submit" name="ajoute" class="submit-btn">
                            Ajouter la categorie
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    </main>
   
    <main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Gérer utilisateurs </h2>
                <p class="subtitle">Liste d'utilisateurs</p>
            </div>
           
        </div>

        <div class="courses-table">
            <table>
                <thead>
                    <tr>
                        <th>tag</th>
                       
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tbody>
              
                   <?php
                   $categories=$admin-> showCategorie();
                   foreach($categories as $categorie):
                   
                   ?>
                    <tr>
                        <td>
                        <?php     echo htmlspecialchars($categorie['categorie_name'])?>
                        </td>
                       
               
                        <td class="actions">
                      
                                
                               
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette categorie  ?');">
                                <input type="hidden" name="categorie_id" value="    <?php echo htmlspecialchars($categorie['categorie_id'])?>">
                                <button  style="background:transparent;border:none"type="submit" name="removecat" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                               
                          
                        </td>
                    </tr>
                   <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</main>
         
     
</body>
</html>
</body>
</html>