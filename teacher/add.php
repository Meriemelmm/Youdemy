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
<body style=" ">
    <div style="dislplay:flex">
    <?php include '../side/sidebarTeacher.php';?>
    
    <main class="main-content">
        <div class="content-wrapper">
            <div class="header">
                <div>
                    <h2 class="title">Ajouter un jeu</h2>
                    <p class="subtitle">Créer une nouvelle fiche de jeu</p>
                </div>
            </div>
    
            <form action="add.php" method="POST" class="form-container">
                <div class="form-grid">
                    <div class="form-item full-width">
                        <label for="title" class="form-label">Titre du jeu</label>
                        <input type="text" id="title" name="title" required class="form-input">
                    </div>
    
                    <div class="form-item full-width">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="4" class="form-input"></textarea>
                    </div>
    
                    <div class="form-item">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" id="genre" name="genre" required class="form-input">
                    </div>
    
                    <div class="form-item">
                        <label for="release_date" class="form-label">Date de sortie</label>
                        <input type="date" id="release_date" name="release_date" class="form-input">
                    </div>
    
                    <div class="form-item full-width">
                        <label for="game_image" class="form-label">Image URL</label>
                        <input type="url" id="game_image" name="game_image" class="form-input">
                    </div>
    
                    <div class="form-item full-width">
                        <button type="submit" name="ajoute" class="submit-btn">
                            Ajouter le jeu
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    </div>
    
</body>
</html>