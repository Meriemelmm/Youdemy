<?php 
 require '../classes/user.php';
 require'../classes/cour.php';
 require'../classes/tag_course.php';
 $course= new course();
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
}?>
 
 
 
 
 
 <!DOCTYPE html>
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
                    <th>teacher</th>
                        <th>titre de cours</th>
                            <th>categrie</th>
                        <th>tags</th>
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $courses=$course->showCour();
                 
                 foreach($courses as $course):
                 if( $course['text_content']==NULL):?>
                  <tr>
                      <td>
                         
                   
                      <?php echo htmlspecialchars($course['username']);?> 
                        </td>
                        <td> <?php echo  htmlspecialchars($course['cours_title']);?></td>
                        <td> <?php echo  htmlspecialchars($course['categorie_name']);?></td>
                        <td>
                        <?php $coursid=$_SESSION['cours_id']=$course['cours_id'];
                         $tags=(new tag_course)->tags_course($coursid);
                         foreach ($tags as $tag) {
                            echo htmlspecialchars($tag['tag_name']);
                            echo "<br>"; 
                        }
                         ?>

                      </td>
             
                      <td class="actions">
                    
              
                  
                      <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet cours ?');">
                              <input type="hidden" name="cours_id" value=" <?php echo  htmlspecialchars($course['cours_id']);?>">
                              <button  style="background:transparent;border:none"type="submit" name="remove" class="delete-btn">
                                  <i class="fas fa-trash"></i>
                              </button>
                          </form>
                             
                        
                      </td>
                  </tr>

                 <?php 
               endif;
                 endforeach;?>
                   
                </tbody>
            </table>
        </div>
    </div>
</main>


</body>
</html>