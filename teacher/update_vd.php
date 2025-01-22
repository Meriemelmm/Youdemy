
<?php require'../classes/admin.php';
require'../classes/tags.php';
if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
}




if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
}






require'../classes/tag_course.php';
require'../classes/vedio.php';

   
$cour_text=new  course();
$courseid=$_GET['updateid']; 
if (isset($_GET['updateid'])) {
   
$courses=$cour_text->getCourseid($courseid);
foreach($courses as $course){
    $titles=$course['cours_title'];
    $descriptions=$course['cours_description'];
    $contents=$course['vedio_content'];
    $categorieid=$course['category_id'];


}



} else {
    echo "updateid manquant.";
}
$selectedTags=[];
$tages=(new tag_course())->tags_course($courseid);
foreach( $tages as $tag){
   $selectedTags[]=$tag['tag_id'];}
   

   $coursed=new cour_vedio();
   if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['update'])){
           try{
               $title = $_POST['title']?? '';
                         $description = $_POST['description']?? '';;
                      $categorieid = $_POST['categories']?? '';;
                        $content = $_POST['video_url']?? '';;
                        $tags =$_POST['tags']?? '';;
                   
          
            
   
   
   $coursed->UpdateCourse($title,$description,$categorieid,$content,$courseid,$tags);
   
   header("location:../teacher/vediocour.php");
   
   
           }
           catch(PDOException $e){
               return"erreur".$e->getMessage();
           }
   
        }
   }


















?> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="../styleee.css">
   <link rel="stylesheet" href="../styles.css">

    <link rel="stylesheet" href="../chi.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body style=" ">
    <div style="dislplay:flex">
        
    <?php include '../side/sidebarTeacher.php';?>
   
    <main class="main-content">
        <div class="content-wrapper">
            <div class="header">
                <div>
                    <h2 class="title">update un cour</h2>
                    <p class="subtitle">update une fiche de cours</p>
                </div>
            </div>
    
            <form action="" method="POST" class="form-container">
                <div class="form-grid">
                    <div class="form-item full-width">
                        <label for="title" class="form-label">Titre du cours</label>
                        <input type="text" id="title" name="title" required class="form-input" value="<?php echo htmlspecialchars($titles)?>">
                    </div>
    
                    <div class="form-item full-width">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="4" class="form-input" require >
                            <?php echo htmlspecialchars($descriptions); ?></textarea>
                    </div>
    
                    <div class="form-item full-width">
                        <label for="genre" class="form-label">categorie</label>
                       
                        <select name="categories" class="form-input" style="width:120vh;">
          <?php
          $categories = (new admin())->showCategorie(); 
    foreach ($categories as $categorie):
        $selected = ($categorie['categorie_id'] == $categorieid) ? 'selected' : '';  
    ?>
        <option value="<?php echo htmlspecialchars($categorie['categorie_id']); ?>"<?php echo $selected; ?>  >
            <?php echo htmlspecialchars($categorie['categorie_name']); ?>
        </option>
       
    <?php endforeach; ?>
</select>
                    </div>

                    
                   
                    <!-- tags -->
                  
                    
                    <div class="form-item full-width">
    <label for="genre" class="form-label">Tags</label><div style="overflow-y: scroll;  height:100px ">
    <?php
    $tags = (new tags())->showTags(); 
    foreach ($tags as $tag): 
        $checked = in_array($tag['tag_id'], $selectedTags) ? 'checked' : '';   
    ?> 
        <div class="checkbox-item">
            <input type="checkbox" name="tags[]" value="<?php echo htmlspecialchars($tag['tag_id']); ?>" 
            id="tag_<?php echo $tag['tag_id']; ?>" class="tag-checkbox" <?php echo $checked; ?>>
            <label for="" class="tag-label"><?php echo htmlspecialchars($tag['tag_name']); ?></label>
        </div>
       
    <?php endforeach; ?> </div>
</div>
      
    <div class="form-item full-width" id="change" >
       
    <label for="game_image" class="form-label">Video URL</label>
    <input type="url" id="video_url" name="video_url" class="form-input" value="<?php echo htmlspecialchars($contents); ?>">
      `;       
                    </div>
                    <div class="form-item full-width" >
                        <button type="submit" name="update" class="submit-btn">
                         
                           update cours
                        </button>
                        <a href="../teacher/vediocour.php"><button type="submit" name="update" class="submit-btn">retour  </button></a>
                           
                         
                      
                        
                    </div>
                </div>
            </form>
        </div>
    </main>
    

    </div>
    


    <script>








</script>

</body>
</html>