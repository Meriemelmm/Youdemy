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
       /* Section Hero */
       .hero {
            background-color: #2196F3;
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin-top: 60px;
        }
        ul {
            list-style: none; /* Supprime les puces */
            padding-left: 0;   /* Retire le retrait à gauche */
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
            background-color: white;
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
            background-color: #f26b38;
         
        }

        .cours-card .btn {
            background-color: rgb(5, 5, 35);
            color: white;
            padding: 12px 25px;
            font-size: 1.1em;
            height: 60px;
            border-radius: 5px;
            text-align: center;
            display: inline-block;
            margin-top: 10px;
        }

       
      


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

      
        header {
           
           
          
            padding: 20px 10%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

       

        .logo h1 {
            font-size: 2.5em;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            color: rgb(15, 4, 44);

            letter-spacing: 3px;
            margin: 0;
            display: flex;
            align-items: center;
        }


        .logo h1 i {
            margin-right: 05px;
            font-size: 1.2em;
            color: rgb(201, 110, 12);
            color: #f26b38;
        }

       
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Body */
body {
    background-color: white;
    margin: 0;
    padding: 0;
}

/* Anchor tags */
a {
    text-decoration: none;
    color: inherit;
}

/* Header */
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

header .logo h1 {
    font-size: 2em;
    font-family: 'Arial', sans-serif;
    font-weight: bold;
    color: #f26b38;

    letter-spacing: 3px;
    margin: 0;
}

header ul.menu {
    display: flex;
    gap: 20px;
}

header ul.menu li a {
    color: rgb(15, 4, 44);
    font-size: 1.2em;
    font-weight: bold;
}

header ul.menu li a:hover {
    color: #f26b38;
}

/* Hero Section */
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

/* Cours Populaires Section */
.cours-populaires {
    padding: 60px 20px;
    background-color: white;
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
    justify-content: center;
}

.cours-card {
    width: 350px;
    box-shadow: 0 4px 10px rgba(181, 194, 165, 0.1);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
    text-align: center;
    padding: 20px;
    background-color: hsla(186, 43%, 64%, 0.1);
    margin-bottom: 20px;
}




/* Responsive Design */
@media screen and (max-width: 768px) {
    header nav {
        flex-direction: column;
        text-align: center;
    }

    .menu {
        flex-direction: column;
        margin-top: 20px;text-decoration: none;
        list-style: none;
    }

    .menu li {
        margin: 10px 0;
        
    }
    ul {
    list-style: none;  /* Supprime les puces */
       /* Enlève le retrait par défaut à gauche */
}

    .cours-container {
        flex-direction: column;
        align-items: center;
    }

    .cours-card {
        width: 90%;
    }

    .hero h2 {
        font-size: 2em;
    }

    .hero p {
        font-size: 1em;
    }

    .hero .btn {
        padding: 10px 20px;
        font-size: 1em;
    }
}

/* Form Styling */
form {
    margin: 30px 0;
    text-align: center;
}

form input[type="text"] {
    padding: 10px;
    font-size: 1.2em;
    border: 2px solid #ccc;
    border-radius: 5px;
    width: 900px;
    margin-right: 10px;
}

form button {
    padding: 12px 25px;
    font-size: 1.1em;
    border-radius: 5px;
    border: none;
    background-color: #2196F3;
    color: white;
}

form button:hover {
    background-color: #1e88e5;
}

/* Pagination */
/* Pagination */
/* Pagination Container */
.pagination {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 30px;
    text-align: center;
}

/* Pagination Links */
.pagination a {
    display: inline-block;
    padding: 10px 15px;
    background-color: #2196F3;
    color: white;
    font-size: 1.2em;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}


.pagination a:hover {
    background-color: #1e88e5;
    transform: scale(1.1); 
}


.pagination a.disabled {
    background-color: #b0bec5;
    color: white;
    pointer-events: none; 
}


.pagination a:first-child {
    border-radius: 5px 0 0 5px; 
}

.pagination a:last-child {
    border-radius: 0 5px 5px 0; /* Bord arrondi pour le dernier bouton */
}

 
    </style>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>
<body>

   

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


                <li><a href="../auth/signup.php">sign up</a></li>
                <li><a href="../auth/login.php">login</a></li>
               

            </ul>
        </nav>
    </header>
      <h1 style="text-align: center;">Ma Liste de Courses</h1>
 

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
                <a href="#" style="margin-top:40px" class="btn">Plus pxdétails</a>
          <form method="POST" onsubmit="return confirm('Voulez-vous vraiment inscrit dans ce cours  ?');">
                                <input type="hidden" name="cours_id" value="<?php echo htmlspecialchars($coursid);?>">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($course['user_id']);?>">
                                <button  style=""type="submit" name="isncrit" class="btn">
                                  
                                    S'inscrire au cours 


                                </button>
                            </form></div>
            
            </div>
            <!-- Vous pouvez ajouter d'autres cartes ici -->
          
            <?php endforeach;?>
           
        </div>
    </section>


    <footer>
  

</body>
</html>
