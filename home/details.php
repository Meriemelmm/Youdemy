


<?php

 require'../classes/cour.php';
 require'../classes/tag_course.php';
 $course= new course();
 $courseid=$_GET['detail'];
 
 $courses=$course->gettedCourse($courseid);
 $tag_course=new tag_course();
 $tags=$tag_course->tags_course($courseid);










?>








<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Cours - ChatGPT et IA</title>
    <link rel="stylesheet" href="styles.css">
    <style>/* Style global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: rgb(15, 4, 44);
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color:white;
            color: rgb(15, 4, 44);
            line-height: 1.6;
        }
        
        
       
        main {
            padding: 40px 0;
        }
        
        .container {
            width: 80%;
            margin: 0 auto;
        }
        
        /* Section - Titre du cours */
        .cours-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .cours-header h2 {
            font-size: 2rem;
            color: #333;
        }
        
        .cours-intro {
            font-size: 1.2rem;
            color: #777;
            margin-top: 10px;
        }
        
        /* Section - Créateur, catégorie et tags */
        .meta-section {
            text-align: center;
            margin-bottom: 40px;
            color: #555;
        }
        
        .meta-section p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        
        .tag {
           
            color: #333;
            padding: 5px 10px;
            margin-right: 10px;
            border-radius: 5px;
            font-size: 1rem;
            display: inline-block;
        }
        
        /* Vidéo */
        .video-section {
            margin-bottom: 40px;
        }
        
        .video-section iframe {
            width: 100%;
            border-radius: 10px;
            border: none;
        }
        
        /* Objectifs du Cours */
        .objectifs-section {
            margin-bottom: 40px;
        }
        
        .objectifs-section h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        ul {
            list-style: none;
            padding: 0;
        }
        
        ul li {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 10px;
        }
        
        /* Contenu du Cours */
        .contenu-section {
            margin-bottom: 40px;
        }
        
        .contenu-section h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        ul li {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 10px;
        }
        
        /* Call to action - Bouton d'inscription */
        .cta-section {
            text-align: center;
        }
        
      
        
      
        </style>
</head>
<body>



    <main> 
           <?php  foreach( $courses as $course ):
            ?>
            <?php if($course['text_content']==null):?>
        <div class="container">
           
            <section class="cours-header">
                <h2><?php echo htmlspecialchars($course['cours_title']);?> </h2>
                <p class="cours-intro"><?php echo htmlspecialchars($course['cours_description'])?></p>
               
            </section>

           
            <section class="meta-section">
                <p><strong>Créé par :</strong><?php echo htmlspecialchars($course['username']);?></p>
                <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($course['categorie_name']);?></p>
                <p><strong>Tags :</strong>  
                    <?php foreach($tags as $tag):?> <span class="tag"> <?php echo htmlspecialchars($tag['tag_name'])?></span>, <?php endforeach;?></p>
            </section>

          
            <section class="video-section">
    <h3>Vidéo de Présentation</h3>
   
    <iframe width="100%" height="500" src="<?=  htmlspecialchars($course['vedio_content']);?>" frameborder="0" allowfullscreen></iframe>
</section>


           
          
        </div>
         <?php else: ?>
            <div class="container">
          
            <section class="cours-header">
                <h2> <?php echo  htmlspecialchars($course['cours_title']);?></h2>
                <p class="cours-intro"> <?php echo htmlspecialchars($course['cours_description']);?></p>
               
            </section>

           
            <section class="meta-section">
                <p><strong>Créé par :</strong> <?php echo htmlspecialchars($course['username']);?></p>
                <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($course['categorie_name']);?></p>
                <p><strong>Tags :</strong>  
                <?php foreach($tags as $tag):?> <span class="tag"> <?php echo htmlspecialchars($tag['tag_name'])?></span>, <?php endforeach;?></p>
            </section>

         


            
           

           
            <section class="contenu-section">
                <h3>Contenu du Cours</h3>
                <ul>
                    <li><?php echo htmlspecialchars($course['text_content']);?></li>
                    
                </ul>
            </section>

            <!-- Bouton d'inscription -->
          
        </div> 
        <?php endif;?>
        <?php endforeach;?>
    </main>

 
  
</body>
</html>


