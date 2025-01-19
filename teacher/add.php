


<?php require'../classes/admin.php';

require'../classes/cour_text.php';
require'../classes/vedio.php';
var_dump($_SESSION['username']);

if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
}






$cour_vedio= new cour_vedio();
$cour_text=new  text_cour();
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['ajoute'])){

       $title=$_POST['title'];

       $description=$_POST['description'];
       $Categorieid=$_POST['categories'];
       $tags = $_POST['tags'];
       $typecontent=$_POST['typecontent'];
       $video_url=$_POST['video_url'];
    
$teacherid= $_SESSION['user_id'] ;
       $text_content=$_POST['text_content'];
       
       var_dump($tags);

       if($typecontent==='text'){
        
             $cour_text->addCour($Categorieid,$title,$text_content ,$description,$teacherid,$tags);
      
        
       
        

       }
       elseif ($typecontent==='vedio'){
       
            $cour_vedio->addCour($Categorieid,$title,$video_url,$description,$teacherid,$tags);
        
        
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
                    <h2 class="title">Ajouter un cour</h2>
                    <p class="subtitle">Créer une nouvelle fiche de cours</p>
                </div>
            </div>
    
            <form action="add.php" method="POST" class="form-container">
                <div class="form-grid">
                    <div class="form-item full-width">
                        <label for="title" class="form-label">Titre du cours</label>
                        <input type="text" id="title" name="title" required class="form-input">
                    </div>
    
                    <div class="form-item full-width">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="4" class="form-input"></textarea>
                    </div>
    
                    <div class="form-item full-width">
                        <label for="genre" class="form-label">categorie</label>
                       
                        <select name="categories" class="form-input" style="width:120vh;">
          <?php
          $categories = (new admin())->showCategorie(); 
    foreach ($categories as $categorie):  
    ?>
        <option value="<?php echo htmlspecialchars($categorie['categorie_id']); ?>" >
            <?php echo htmlspecialchars($categorie['categorie_name']); ?>
        </option>
       
    <?php endforeach; ?>
</select>
                    </div>

                    
                   
                    <!-- tags -->
                  
                    
                    <div class="form-item full-width">
    <label for="genre" class="form-label">Tags</label><div style="  overflow-y: scroll;  height:100px ">
    <?php
    $tags = (new admin())->showTags(); 
    foreach ($tags as $tag):    
    ?> 
        <div class="checkbox-item">
            <input type="checkbox" name="tags[]" value="<?php echo htmlspecialchars($tag['tag_id']); ?>" id="tag_<?php echo $tag['tag_id']; ?>" class="tag-checkbox">
            <label for="tag_<?php echo $tag['tag_id']; ?>" class="tag-label"><?php echo htmlspecialchars($tag['tag_name']); ?></label>
        </div>
       
    <?php endforeach; ?> </div>
</div>



                 
    <div class="form-item full-width"  style="display:none"; >
    <label for="game_image" class="form-label">Text Content</label>
    <textarea name="text_content" id="text_content" class="form-input"></textarea>
    <label for="game_image" class="form-label">Video URL</label>
    <input type="url" id="video_url" name="video_url" class="form-input">
                      
                    </div>
                    
    
                    
                    <div class="form-item">
                        <label for="genre" class="form-label">typecontent</label>
                       
                        <select name="typecontent" class="form-input" id="formation_select" style="width:120vh;">
    <option value="text">text</option>
    <option value="vedio">vedio</option>
</select>

                    </div>
    <div class="form-item full-width" id="change" >
                      
                    </div>
                    <div class="form-item full-width" >
                        <button type="submit" name="ajoute" class="submit-btn">
                            Ajouter le jeu
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    

    </div>
    


    <script>








  let formation_select = document.getElementById("formation_select"); 
  let change = document.getElementById("change");

  formation_select.addEventListener("change", () => {
    let formulevalue = formation_select.value;

  
    change.innerHTML = ''; 

    if (formulevalue === "text") {
      change.innerHTML = `
        <label for="game_image" class="form-label">Text Content</label>
        <textarea name="text_content" id="text_content" class="form-input"></textarea>
      `;
    } else if (formulevalue === "vedio") {
      change.innerHTML = `
        <label for="game_image" class="form-label">Video URL</label>
        <input type="url" id="video_url" name="video_url" class="form-input">
      `;
    }
  });
</script>

</body>
</html>