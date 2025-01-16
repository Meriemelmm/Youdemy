 
 
 
 
 <?php
 require'../classes/admin.php';
 $admin=new admin();

$admin->showTeachers();
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['modifier']) && isset($_POST['status'])&& isset($_POST['user_id'])){
        $status=$_POST['status'];
        $userid=$_POST['user_id'];
        try{
            echo $admin-> validatedCompte($status,$userid);
        }
        catch(PDOException $e){
            echo" erreur".$e->getMessage();
        }
    }
}


 
 
 
 
 
 ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <style>.main {
    margin-left: 250px;
    padding: 32px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 32px;
}

.title {
    font-size: 1.5rem;
    font-weight: bold;
}

.subtitle {
    color: #9CA3AF;
}

/* Table */
.table-container {
    background-color: #2D3748;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table-header {
    background-color: #4A5568;
}

.table-cell {
    padding: 16px;
    text-align: left;
}

.table-row:hover {
    background-color: #4A5568;
}

.user-info {
    display: flex;
    align-items: center;
}

.avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    margin-right: 12px;
}

.role-badge {
    padding: 4px 8px;
    border-radius: 9999px;
    font-size: 0.75rem;
}

.admin {
    background-color: #3182CE;
    color: white;
}

.user {
    background-color: #2D3748;
    color: white;
}

/* Formulaire */
.form {
    display: flex;
    align-items: center;
}

.role-select {
    background-color: #2D3748;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    margin-right: 8px;
    font-size: 0.875rem;
    border: 1px solid #4A5568;
}

.role-select:focus {
    outline: none;
    border-color: #3182CE;
    box-shadow: 0 0 4px rgba(66, 153, 225, 0.6);
}

.btn {
    background-color: #3182CE;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}

.btn:hover {
    background-color: #4299E1;
}

.btn:focus {
    outline: none;
    box-shadow: 0 0 4px rgba(66, 153, 225, 0.6);
}</style>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include '../side/sideAdmin.php';?>
<main class="main">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Gestion des validate compte</h2>
                <p class="subtitle">Attribution et modification des status_compte</p>
            </div>
        </div>

        <div class="table-container">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th class="table-cell">teachers</th>
                        <th class="table-cell">Email</th>
                        <th class="table-cell">status actuel</th>
                        <th class="table-cell">Modifier status</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                   
                <?php   $teachers=$admin->showTeachers();

                foreach($teachers as $teacher):
                ?>
                    <tr class="table-row">
                        <td class="table-cell user-info">
                            <img src="https://api.dicebear.com/6.x/initials/svg?seed=<?= htmlspecialchars($teacher['username']) ?>" alt="Avatar" class="avatar">
                            <span><?php echo htmlspecialchars($teacher['username'])?></span>
                        </td>
                        <td class="table-cell"><?php echo htmlspecialchars($teacher['email'])?></td>
                        <td class="table-cell">
                           <?php echo htmlspecialchars($teacher['compte_status'])?>
                        </td>
                        
                        <td class="table-cell">
                            <form action="" method="POST" class="form">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($teacher['user_id'])?>">
                                <select name="status" class="role-select">
                                    <option value="pending" >pending</option>
                                    <option value="accepted">accepted</option>
                                    <option value="rejected" >rejected</option>
                                  
   

                                  
                                </select>
                                <button type="submit" name="modifier" class="btn">Modifier</button>
                            </form>
                        </td>
                    </tr>
                   <?php endforeach ?> 
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>