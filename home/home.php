<?php




require'../classes/cour.php';
require'../classes/tag_course.php';

$course= new course();

require'../classes/etudiant.php';





 if($_SERVER['REQUEST_METHOD']==='POST'){
    $userid=$_SESSION['user_id'];
$coursid=$_POST['cours_id'];
$teacherid=$_POST['user_id'];

if(isset($_POST['isncrit'])){
    $etudiant= (new Etudiant())->inscriptionCourses($userid,$coursid,$teacherid);   
}
 }



           






?>
















<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Cours en Ligne</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* RESET CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;font-family: 'Arial', sans-serif;
        }
        
        /* Styles de base */
        body {
           
            background-color: white;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        ul {
            list-style: none;
        }

        /* En-tête */
        header {
            color: black;
            padding: 20px 0;
            height: 100px;
        
        }

        header nav {
            display: flex;
            justify-content: space-between;
           
            align-items: center;
            padding: 0 60px;
        }

        /* header .logo h1 {
            font-size: 1.8em;
            font-size: larger;
           color:blue;
          
           
        } */

        header ul.menu {
            display: flex;
            gap: 12px;
        }

        header ul.menu li a {
            color:rgb(15, 4, 44);
            font-size: 1.6em; font-family: 'Arial', sans-serif;
    font-weight: bold;
    color:rgb(15, 4, 44);
           
        }

        header ul.menu li a:hover {
            color: #f26b38;
        }

        /* Section Hero */
        .hero {
            background-color: #2196F3;
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin-top: 60px;
        }

        .hero h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .hero .btn {
            background-color: #f26b38;
            color: white;
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 5px;
        }

        /* Cours Populaires */
        .cours-populaires {
            padding: 60px 20px;
            background-color:white ;
            text-align: center;
        }

        .cours-populaires h2 {
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        .cours-container {
            display: flex;
           
            gap: 20px;
            flex-wrap: wrap;
        }

        .cours-card {
          
           
            width: 350px;
            box-shadow: 0 4px 10px rgba(181, 194, 165, 0.1);
            border-radius: 8px;
           
            overflow: hidden;
            transition: transform 0.3s ease;
            text-align: center;
            padding: 20px;
            background-color: hsla(186, 43.00%, 64.90%, 0.10);
        }

        .cours-card:hover {
            transform: scale(1.05);
        }

        .cours-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .cours-card h3 {
            font-size: 1.6em;
            margin-top: 20px;
        }

        .cours-card p {
            font-size: 1.1em;
            color: #555;
            margin: 15px 0;
        }

        .cours-card .category,
        .cours-card .tags {
            font-size: 0.9em;
            color: #777;
            margin-top: 10px;
        }

        .cours-card .tags span {
            margin-right: 5px;
            
            color: black;
            padding: 5px;
            border-radius: 5px;
        }

        .cours-card .btn {
            background-color: rgb(5, 5, 35);
            color: white;
            padding: 12px 25px;
            font-size: 1.1em;
            height:60px;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
            margin-top: 10px;
        }

        .cours-card .btn:hover {
            background-color: #45a049;
        }

        /* Pied de page */
        footer {
            background-color: black;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer .footer-container {
            margin-top: 20px;
        }

        footer .footer-menu {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        footer .footer-menu li a {
            color: white;
            font-size: 1em;
        }

        footer .footer-menu li a:hover {
            text-decoration: underline;
        }

        /* Responsive */
      
       
/* Basic reset for margin/padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Styling for the header and navigation */
header {
   /* Dark background */
    color: #fff;            /* White text */
    padding: 20px 10%;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logo styling */

.logo h1 {
    font-size: 2.5em;
    font-family: 'Arial', sans-serif;
    font-weight: bold;
    color:rgb(15, 4, 44);
   
    letter-spacing: 3px;
    margin: 0;
    display: flex;
    align-items: center; 
}


.logo h1 i {
    margin-right:05px;
    font-size: 1.2em;    
    color:rgb(201, 110, 12);  
    color:#f26b38;   
}

/* Menu styling */


/* Responsive design for smaller screens */
@media screen and (max-width: 768px) {
    nav {
        flex-direction: column;
        text-align: center;
    }

    .menu {
        flex-direction: column;
        margin-top: 20px;
    }

    .menu li {
        margin: 10px 0;
    }
}

    </style>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <head>
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>



</head>
<body>

    <!-- En-tête -->
    <header>
        <nav>
            <div class="logo">
            <h1><i class="fas fa-graduation-cap"></i> YOUDEMY</h1>
            </div>
            <ul class="menu">
                <li><a href="../home/home.php">Accueil</a></li>
                <?php 
if (isset($_SESSION['user_id']) && $_SESSION['role'] === "Etudiant") {
    echo '<li><a href="../home/mescourses.php">Mes courses</a></li>';
}
?>

              
                <li><a href="#">sign up</a></li>
                <li><a href="#">login</a></li>
               
            </ul>
        </nav>
    </header>

    <!-- Section Hero -->
    <section class="hero">
        <h2>Améliorez vos compétences avec des cours en ligne</h2>
        <p>Rejoignez des milliers d'étudiants dans des cours de qualité pour améliorer vos compétences professionnelles.</p>
        <a href="#" class="btn">Commencez maintenant</a>
    </section>
 
    <!-- Cours populaires -->
    <section class="cours-populaires">
        <h2>Cours populaires</h2>
        <div class="cours-container">
            <?php  $courses=$course->showCour(); 
            foreach($courses as $course)   :                   ?>
            <div class="cours-card">
                <img src="https://i.pinimg.com/236x/9c/a0/c2/9ca0c219922d287098f6f27c1c527f5c.jpg" alt="Cours Image">
                <h3><?php echo htmlspecialchars( $course['cours_title']);?></h3>
                <p><?php echo htmlspecialchars( $course['cours_description']);?></p>
                <div class="category">Catégorie: <?php echo htmlspecialchars( $course['categorie_name']);?></div>
                <div class="tags">
                    <?php 
                    
                    $coursid= $_SESSION['cours_id']=htmlspecialchars($course['cours_id']);
                    
                    
                    $tags=(new tag_course)->tags_course($coursid) ;
                    foreach($tags as $tag) :   ?>
                    <span> <?php echo  htmlspecialchars($tag['tag_name'])?></span><?php endforeach;?>
                    <!-- <span>CSS</span>
                    <span>JavaScript</span> -->
                </div>
                <div style="display:flex; gap:20px">
                <a href="../home/details.php?detail=<?php echo htmlspecialchars($coursid);?>"
                 class="btn">Plus pxdétails</a>
          <form method="POST" onsubmit="return confirm('Voulez-vous vraiment inscrit dans ce cours  ?');">
                                <input type="hidden" name="cours_id" value="<?php echo htmlspecialchars($coursid);?>">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($course['user_id']);?>">
                                <button type="submit" name="isncrit" class="btn">
                                  
                                    S'inscrire au cours 


                                </button>
                            </form></div>
            
            </div>
            <!-- Vous pouvez ajouter d'autres cartes ici -->
          
            <?php endforeach;?>
           
        </div>
    </section>

    <!-- Pied de page -->
    <footer>
        <div class="footer-container">
            <ul class="footer-menu">
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>
