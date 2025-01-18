<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Cours en Ligne</title>
    <link rel="stylesheet" href="styles.css">
    <style>body {
    font-family: 'Open Sans', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background-color: #0D47A1;
    color: white;
}

header .logo {
    font-size: 1.5em;
    font-weight: bold;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

#hero {
    text-align: center;
    padding: 50px 20px;
    background-color: #1976D2;
    color: white;
}

#hero h1 {
    font-size: 2.5em;
    margin: 0;
}

#hero p {
    font-size: 1.2em;
    margin: 20px 0;
}

#hero .btn {
    background-color: #FFCA28;
    color: #333;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

section {
    margin: 20px;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

section h2 {
    margin-top: 0;
}

.course {
    display: flex;
    align-items: center;
    margin: 20px 0;
}

.course img {
    max-width: 150px;
    margin-right: 20px;
    border-radius: 8px;
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #0D47A1;
    color: white;
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">YouDemy</div>
        <nav>
            <ul>
                <li><a href="#home">Accueil</a></li>
                <li><a href="#courses">Cours</a></li>
                <li><a href="#about">À propos</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="hero">
        <h1>Apprenez de nouvelles compétences en ligne, à votre rythme</h1>
        <p>Accédez à des milliers de cours en ligne de haute qualité, dispensés par des experts.</p>
        <a href="#courses" class="btn">Voir les cours</a>
    </section>

    <section id="courses">
        <h2>Nos Cours</h2>
        <div class="course">
            <img src="web-development.jpg" alt="Développement Web">
            <h3>Développement Web</h3>
            <p>Apprenez les bases du HTML, CSS, et JavaScript.</p>
        </div>
        <div class="course">
            <img src="data-science.jpg" alt="Data Science">
            <h3>Data Science</h3>
            <p>Découvrez les secrets de l'analyse des données avec Python.</p>
        </div>
        <!-- Ajoutez plus de cours ici -->
    </section>

    <section id="about">
        <h2>À propos de nous</h2>
        <p>Notre mission est de rendre l'éducation accessible à tous, partout.</p>
    </section>

    <section id="contact">
        <h2>Contactez-nous</h2>
        <p>Email: contact@youdemy.com</p>
    </section>

    <footer>
        <p>&copy; 2025 YouDemy. Tous droits réservés.</p>
    </footer>
    <div class="form-item full-width">
                        <label for="genre" class="form-label">tags</label>
                      
                        <?php
   
    $tags = (new admin())->showTags(); 
    foreach ($tags as $tag):    
    ?>
        <input type="checkbox" name="tags[]" value="<?php echo htmlspecialchars($tag['tag_id']); ?>" id="tag_<?php echo $tag['tag_id']; ?>">
        <label for="tag_<?php echo $tag['tag_id']; ?>"><?php echo htmlspecialchars($tag['tag_name']); ?></label><br>
    <?php endforeach; ?>
                    </div>
</body>
</html>

