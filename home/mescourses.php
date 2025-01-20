<?php

require'../classes/etudiant.php';
$etudiant= new Etudiant();

?><!DOCTYPE html>
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
            box-sizing: border-box;
        }
        
        /* Styles de base */
        body {
            font-family: Arial, sans-serif;
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
            padding: 0 20px;
        }

        header .logo h1 {
            font-size: 1.8em;
            font-size: larger;
            background: linear-gradient(135deg, #0000ff, #87ceeb);
           
        }

        header ul.menu {
            display: flex;
            gap: 20px;
        }

        header ul.menu li a {
            color: black;
            font-size: 1.1em;
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
            background-color:rgb(25, 35, 165) ;
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
            text-align: center;
            padding: 20px;
            background-color:white ;
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
        @media (max-width: 768px) {
            .cours-container {
                flex-direction: column;
                align-items: center;
            }

            header ul.menu {
                flex-direction: column;
                gap: 10px;
            }

            .hero h2 {
                font-size: 2em;
            }

            .hero p {
                font-size: 1.1em;
            }
        }
    </style>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
<body>

    <header>
        <nav>
            <div class="logo">
                <h1>Youdemy</h1>
            </div>
            <ul class="menu">
                <li><a href="../home/home.php">Accueil</a></li>
                <li><a href="#">Cours</a></li>
                <li><a href="#">Catégories</a></li>
                <li><a href="#">Connexion</a></li>
                <li><a href="../home/mescourses.php#">Mes courses</a></li>
            </ul>
        </nav>
    </header>

    <header>
      <h1>Ma Liste de Courses</h1>
 

    <!-- Cours populaires -->
    <section class="cours-populaires">
       
        <div class="cours-container">
            <?php  $etudiantid=$_SESSION['user_id'];
             $courses=$etudiant->MesCourses($etudiantid); 
            foreach($courses as $course)   :                   ?>
            <div class="cours-card">
                <img src="https://i.pinimg.com/236x/9c/a0/c2/9ca0c219922d287098f6f27c1c527f5c.jpg" alt="Cours Image">
                <h3><?php echo htmlspecialchars( $course['cours_title']);?></h3>
                <p><?php echo htmlspecialchars( $course['cours_description']);?></p>
              
                <div style="display:flex; gap:20px">
                <a href="#" class="btn">Plus pxdétails</a>
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
