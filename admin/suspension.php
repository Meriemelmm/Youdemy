



<?php  session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include '../side/sideAdmin.php';?>


<main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Gérer utilisateurs </h2>
                <p class="subtitle">Liste d'utilisateurs</p>
            </div>
           
        </div>

        <div class="courses-table">
            <table>
                <thead>
                    <tr>
                        <th>username</th>
                        <th>email</th>
                        <th>role</th>
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                   
                    <tr>
                        <td>
                            hbsbdbhd
                        </td>
                        <td>jksdjsj</td>
                        <td>njdnjsq</td>
               
                        <td class="actions">
                      
                                
                               
                                <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                <input type="hidden" name="user_id" value="">
                                <button  style="background:transparent;border:none"type="submit" name="delete" class="delete-btn">
                                <i class="fas fa-user-slash"></i>

                                </button>
                            </form>
                               
                          
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</main>
