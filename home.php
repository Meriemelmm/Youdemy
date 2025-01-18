<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Cours en Ligne</title>
    <link rel="stylesheet" href="styles.css">
    <style>/* RESET CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Styles de base */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        
        a {
            text-decoration: none;
        }
        
        ul {
            list-style: none;
        }
        
        /* En-tête */
        header {
            background-color: #333;
            color: white;
            padding: 20px 0;
        }
        
        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        header .logo h1 {
            font-size: 1.8em;
        }
        
        header ul.menu {
            display: flex;
            gap: 20px;
        }
        
        header ul.menu li a {
            color: white;
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
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .cours-card {
            background-color: white;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
            text-align: center;
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
        
        .cours-card .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            font-size: 1.1em;
            border-radius: 5px;
        }
        
        /* Pied de page */
        footer {
            background-color: #333;
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
    justify-content: space-between;
    gap: 30px;
    flex-wrap: wrap;
}

.cours-card {
    background-color: white;
    width: 350px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
    text-align: center;
    padding: 20px;
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

.cours-card .rating {
    margin-bottom: 15px;
}

.cours-card .star {
    color: gold;
    font-size: 1.2em;
}

.cours-card .btn {
    background-color: #4CAF50;
    color: white;
    padding: 12px 25px;
    font-size: 1.1em;
    border-radius: 5px;
    text-align: center;
    display: inline-block;
    margin-top: 10px;
}

.cours-card .btn:hover {
    background-color: #45a049;
}

.cours-card p strong {
    font-weight: bold;
}

        </style>
</head>
<body>

    <!-- En-tête -->
    <header>
        <nav>
            <div class="logo">
                <h1>ApprenezEnLigne</h1>
            </div>
            <ul class="menu">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Cours</a></li>
                <li><a href="#">Catégories</a></li>
                <li><a href="#">Connexion</a></li>
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
   <!-- Cours populaires -->
<section class="cours-populaires">
    <h2>Cours populaires</h2>
    <div class="cours-container">
        <div class="cours-card">
            <img src="https://via.placeholder.com/350x200/4CAF50/FFFFFF?text=Développement+Web" alt="Développement Web">
            <h3>Développement Web</h3>
            <p>Apprenez à créer des sites web modernes et interactifs avec HTML, CSS, JavaScript et bien plus !</p>
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">☆</span>
            </div>
            <p><strong>Durée :</strong> 20 heures</p>
            <p><strong>Formateur :</strong> John Doe</p>
            <a href="#" class="btn">Voir le cours</a>
        </div>

        <div class="cours-card">
            <img src="https://via.placeholder.com/350x200/FF9800/FFFFFF?text=Design+Graphique" alt="Design Graphique">
            <h3>Design Graphique</h3>
            <p>Créez des visuels captivants et professionnels avec Photoshop, Illustrator et InDesign.</p>
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">☆</span>
                <span class="star">☆</span>
            </div>
            <p><strong>Durée :</strong> 15 heures</p>
            <p><strong>Formateur :</strong> Jane Smith</p>
            <a href="#" class="btn">Voir le cours</a>
        </div>

        <div class="cours-card">
            <img src="https://via.placeholder.com/350x200/2196F3/FFFFFF?text=Marketing+Digital" alt="Marketing Digital">
            <h3>Marketing Digital</h3>
            <p>Maîtrisez les stratégies de marketing pour augmenter la visibilité de vos produits en ligne.</p>
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
            </div>
            <p><strong>Durée :</strong> 10 heures</p>
            <p><strong>Formateur :</strong> Michael Brown</p>
            <a href="#" class="btn">Voir le cours</a>
        </div>
    </div>
</section>


    <!-- Pied de page -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2025 ApprenezEnLigne. Tous droits réservés.</p>
            <ul class="footer-menu">
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>


