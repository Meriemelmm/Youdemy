<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="../styleee.css">
   <link rel="stylesheet" href="../styles.css">
   
   <style>form{
            width:100%;
            background-color: #CBDCEB;
            padding:70px;
            
            height: 60px;
           
        
        }
    button {
          padding: 10px 15px;
          font-size: 16px;
          border: none;
          background-color: #3498db;
          color: white;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s;
        }
        .search-bar {
    position: relative;
}

.search-input {
    background-color: #2d3748;
    border: none;
    color: white;
    padding: 10px 20px; 
    
    border-radius: 8px;
    width: 100vh;
}

.search-input::placeholder {
    color: #cbd5e0;
}
</style>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body >
    <div  class="content"style="dislplay:flex;">
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
  
         
     
</body>
</html>