<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styleee.css">
   <link rel="stylesheet" href="../styles.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
   <style></style>
</head>
<body>
    
<?php include '../side/sidebarTeacher.php';?>
    
    
    
    <main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Liste des utilisateurs</h2>
                <p class="subtitle">Gestion des comptes utilisateurs</p>
            </div>
            <div class="search-bar">
                <input type="text" placeholder= "     Rechercher un utilisateur..." class="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>

        <div class="user-table">
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>cours</th>
                        <th>isncrit_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        <td>dbbsqs</td>
                        <td>bdshjsdbqdsqdh</td>
                        <td>
                            <span >
                               sbdjbbsfbfsbhfbh
                            </span>
                        </td>
                        <td class="actions">
                            <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                <input type="hidden" name="user_id" value="">
                                <button type="submit" name="delete" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
</main>

    
</body>
</html>