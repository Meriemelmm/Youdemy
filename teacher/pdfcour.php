

<?php
session_start();


require'../classes/cour_text.php';
$teacherId=$_SESSION['user_id'];
$course= new text_cour();

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['remove']) && isset($_POST['cours_id'])){
        try{
             $coursid=$_POST['cours_id'];
        $course->removeCour($coursid);
        }
        catch(PDOException $e){
            return "erruer".$e->getMessage();

        }
       
    }
}
if(isset($_POST['update'])){
    
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
</head>
<body>
    
<?php include '../side/sidebarTeacher.php';?>

<main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Gérer les cours</h2>
                <p class="subtitle">Liste et modification des cours</p>
            </div>
           
        </div>

        <div class="courses-table">
            <table>
                <thead>
                    <tr>
                        <th>titre</th>
                        <th>description</th>
                        <th>categorie</th>
                   
                        <th>content</th>
                        <th>tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                   <?php $cours=$course->showCour($teacherId);
                   foreach($cours as $cour)  : 
           
                    
                         ?>
                    <tr>
                        
                      
                        <td>
                            <?php echo htmlspecialchars($cour['cours_title'])?>
                        </td>
                        <td> <?php echo htmlspecialchars($cour['cours_description'])?></td>
                        <td> <?php echo htmlspecialchars($cour['categorie_name'])?></td>
                        <td>   <?php echo htmlspecialchars(substr($cour['text_content'], 0, 100));?> 
                    </td>
                        <td> <?php 
                        $coursid=$_SESSION['cours_id']=$cour['cours_id'];
                         $tags=(new tag_course)->tags_course($coursid);
                         foreach ($tags as $tag) {
                            echo htmlspecialchars($tag['tag_name']);
                            echo "<br>"; 
                        }
                         ?></td>
                       
                        <td class="actions">
                            <div class="action-btns">
                              
                                <form method="POST" action="../teacher/update.php?updateid=<?php echo htmlspecialchars($cour['cours_id'])?>" >
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($cour['cours_id'])?>">
                                <button type="submit" name="update" class="delete-btn">
                                <i class="fas fa-edit"></i>
                                </button>
                            </form>
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet cours ?');">
                                <input type="hidden" name="cours_id" value="<?php echo htmlspecialchars($cour['cours_id'])?>">
                                <button type="submit" name="remove" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            
                            </div>
                        </td>
                    </tr>
                   <?php endforeach;?>
                       
                       
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- echo ($cour['category_id'] == $category['category_id']) ? 'selected' : ''; -->

</body>
</html>