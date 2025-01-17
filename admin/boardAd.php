
<?php
 
//   require '../classes/user.php';
//   if (!isset($_SESSION['username'])) {
//       header('Location: ../auth/login.php');
//       exit();
//   }



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../styleee.css"> -->
     <style> .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .header {
           
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
        
        .header-left h1 {
            font-size: 24px;
            color: #2c3e50;
        }
        
        .logout-btn {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #c0392b;
        }
        
        .content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            background-color: #fff;
            margin-top: 20px;
        }
        
        .card {
            background-color:#132c42;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color:white;
        }
        
        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #2980b9;
        }</style>
   <link rel="stylesheet" href="../styles.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include '../side/sideAdmin.php';?>
    <main class="main-content">
            <!-- En-tête -->
            <header class="header">
                <div class="header-left">
                    <h1>Bienvenue sur le Tableau de Bord</h1>
                </div>
               
            </header>

            <!-- Section principale -->
            <section class="content">
                <div class="card">
                    <h3>Nombre total de cours</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3> Le cour avec le plus d' étudiants</h3>
                    <p>80</p>
                </div>
                <div class="card">
                    <h3> Les Top 3 enseignants</h3>
                    <p>meriem el mecaniqui</p>
                    <p>ourda el mecaniqui</p>
                    <p>douae el mecaniqui</p>
                </div>
            </section>
        </main>
</body>
</html