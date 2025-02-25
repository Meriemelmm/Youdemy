<?php


?>

<aside class="sidebar">
        <div class="sidebar-header">
        <h1 class="title">Youdemy</h1>
            <p class="subtitle">teacher</p>
        </div>
    
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="../teacher/board.php" class="nav-link active">
                    <i class="fas fa-chart-line"></i>
                    <span>Tableau de bord</span>
                </a>
            </div>
    
            <div class="nav-section">
                <p class="section-title">Gestion des Cours</p>
                <div class="nav-item">
                    <a href="../teacher/add.php" class="nav-link">
                        <i class="fas fa-plus"></i>

                        <span>Ajouter un cours</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="../teacher/pdfcour.php" class="nav-link">
                    <i class="fas fa-file-pdf"></i>

                        <span>   Les pdf cours</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="../teacher/vediocour.php" class="nav-link">
                     <i class="fas fa-video"></i>


                        <span>Les vedio cours</span>
                    </a>
                </div>

            </div>
    
            <div class="nav-section">
                <p class="section-title">Gestion Utilisateurs</p>
                <div class="nav-item">
                    <a href="../teacher/listes.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Liste Etudiants </span>
                    </a>
                </div>
                
            </div>
        </nav>
    
        <div class="sidebar-footer">
            <div class="user-info">
                <img src="https://api.dicebear.com/6.x/initials/svg?seed=<?php echo htmlspecialchars($_SESSION['username'])?>" class="user-avatar">
                <div>
                    <p class="user-name"> <?php echo htmlspecialchars($_SESSION['username']) ?></p>
                    <p class="user-role">Teacher</p>
                </div>
            </div>
            <a href="../profile/profile.php" class="footer-link">
                <i class="fas fa-user"></i>Mon Profil
            </a>
            <a href="../teacher/deconnect.php" class="footer-link">
                <i class="fas fa-sign-out-alt">Déconnexion</i>
            </a>
        </div>
    </aside>


