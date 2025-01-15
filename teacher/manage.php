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
<body>
    
<?php include '../side/sidebarTeacher.php';?>

<main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Gérer les cours</h2>
                <p class="subtitle">Liste et modification des cours</p>
            </div>
           
        </div>

        <div class="courses-table">
            <table>
                <thead>
                    <tr>
                        <th>titre</th>
                        <th>Titdescriptre</th>
                        <th>tags</th>
                        <th>categorie</th>
                        <th>Ajouté le</th>
                        <th>Date de sortie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                   
                    <tr>
                        <td>
                            hbsbdbhd
                        </td>
                        <td>jksdjsj</td>
                        <td>njdnjsq</td>
                        <td>djs</td>
                        <td>dnn</td>
                        <td>ds</td>
                        <td class="actions">
                            <div class="action-btns">
                                <!-- <a href=" "
                                   class="edit-btn">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href=" "
                                   class="edit-btn">
                                   <i class="fas fa-trash"></i>
                                </a> -->
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                <input type="hidden" name="user_id" value="">
                                <button type="submit" name="delete" class="delete-btn">
                                <i class="fas fa-edit"></i>
                                </button>
                            </form>
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                <input type="hidden" name="user_id" value="">
                                <button type="submit" name="delete" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                               
                            </div>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</main>


</body>
</html>