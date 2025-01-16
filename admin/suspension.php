



<?php 
require'../classes/admin.php';
$admin=new admin();
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['modifier']) && isset($_POST['bann'])&& isset($_POST['user_id'])){
        $status=$_POST['bann'];
        $userid=$_POST['user_id'];
        try{
            echo $admin->bancompte($status,$userid);
        }
        catch(PDOException $e){
            echo" erreur".$e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css"><style>.table-cell {
    padding: 16px;
    text-align: left;
}</style>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include '../side/sideAdmin.php';?>


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
                        <th>status</th>
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $users=$admin->showUsers();
                foreach($users as $user):?>
                   
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($user['username'])?>
                        </td>
                        <td><?php echo htmlspecialchars($user['email'])?></td>
                        <td><?php echo htmlspecialchars($user['status'])?></td>
               
                        <td class="table-cell">
                            <form action="" method="POST" class="form">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id'])?>">
                                <select name="bann" class="role-select">
                                    <option value="unban" >unban</option>
                                    <option value="ban">banni</option>
                                    
                                  
   

                                  
                                </select>
                                <button type="submit" name="modifier" class="btn">Modifier</button>
                            </form>
                        </td>
                    </tr>
                   <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</main>

    
</body>
</html>
