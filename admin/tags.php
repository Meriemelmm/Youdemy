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
    
    <form action="">
       
            <input type="text"  class="search-input"id="tagInput" placeholder="Ajouter un tag...">
            <button onclick="ajouterTag()">Ajouter</button>
            <div id="tagsList"></div>
        
    </form>
  
         
     
</body>
</html>