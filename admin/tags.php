<?php

require'../classes/admin.php';
// require '../classes/user.php';
// if (!isset($_SESSION['username'])) {
//     header('Location: ../auth/login.php');
//     exit();
// }
$admin= new admin ();
if($_SERVER['REQUEST_METHOD']==='POST'){
if(isset($_POST['ajoute']) && isset($_POST['tag'])){
   
    $tagname=$_POST['tag'];
    $alltgs=explode(",",$tagname);
    print_r($alltgs);
//     try{
 foreach($alltgs as $tag){
     $admin->addtasg($tag);
}
//     try{
// foreach($alltgs as $tag){

//      $admin->addtasg($tag);
// }


//     }
//     catch(PDOException $e){
//         echo " erreur".$e->getMessage();
//     }
}



}
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['removetag']) && isset($_POST['tag_id'])){
        $tagid=$_POST['tag_id'];
        try{
    
    echo $admin->removeTags($tagid);
    
    
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
                    <h2 class="title">Ajouter un tag</h2>
                    <p class="subtitle">Créer une nouveau tag</p>
                </div>
            </div>
    
            <form action="../admin/tags.php" method="POST" class="form-container">
                
    
                    <div class="form-item">
                        <label for="genre" class="form-label">TAG</label>
                        <input type="text" id="TAG" name="tag" required class="form-input">
                    </div>
    
                   
    
                   
    
                    <div class="form-item full-width">
                        <button type="submit" name="ajoute" class="submit-btn">
                            Ajouter le tag
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
                <h2 class="title">Gérer tags </h2>
                <p class="subtitle">Liste  des tags</p>
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
               <?php $tags=$admin->showTags();
               foreach($tags as $tag)   :  ?>
                   
                    <tr>
                        <td>
                           <?php echo htmlspecialchars($tag['tag_name'])?>
                        </td>
                       
               
                        <td class="actions">
                      
                                
                               
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet tag ?');">
                                <input type="hidden" name="tag_id" value="<?php echo htmlspecialchars($tag['tag_id'])?>">
                                <button  style="background:transparent;border:none"type="submit" name="removetag" class="delete-btn">
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