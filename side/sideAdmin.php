<?php


?>

<aside class="sidebar">
        <div class="sidebar-header">
            <h1 class="title">Youdemy</h1>
            <p class="subtitle">administrateur</p>
        </div>
    
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="../admin/boardAd.php" class="nav-link active">
                    <i class="fas fa-chart-line"></i>
                    <span>Tableau de bord</span>
                </a>
            </div>
    
            <div class="nav-section">
               
                <div class="nav-item">
                    <a href="../admin/listeTech.php" class="nav-link">
                    <i class="fas fa-check"></i>


                        <span>listes teacher</span>
                    </a>
                </div>
                <div class="nav-item">
                <p class="section-title">Gestion content</p>
                    <a href="../admin/cours.php" class="nav-link">
                        <i class="fas fa-book"></i>
                       
                        <span>Gérer les cours</span>
                    </a>
                    <a href="../teacher/manage.php" class="nav-link">
                    <i class="fas fa-tags"></i>
                        <span>Gérer les tags</span>
                    </a>
                    <a href="../teacher/manage.php" class="nav-link">
                    <i class="fas fa-list"></i>
                        <span>Gérer les categories</span>
                    </a>
                </div>
            </div>
    
            <div class="nav-section">
                <p class="section-title">Gestion Utilisateurs</p>
                <div class="nav-item">
                    <a href="../admin/listeUsers.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Liste utilisateurs</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="../admin/suspension.php" class="nav-link">
                    <i class="fas fa-user-times"></i>
                        <span>suspension</span>
                    </a>
                </div>
                
            </div>
        </nav>
    
        <div class="sidebar-footer">
            <div class="user-info">
                <img src="https://api.dicebear.com/6.x/initials/svg?seed=JohnDoe" class="user-avatar">
                <div>
                    <p class="user-name"><?php echo $_SESSION['username']?></p>
                    <p class="user-role">administrateur</p>
                </div>
            </div>
            <a href="../profile/profile.php" class="footer-link">
                <i class="fas fa-user"></i>Mon Profil
            </a>
            <a href="../auth/login.php" class="footer-link">
                <i class="fas fa-sign-out-alt"></i>Déconnexion
            </a>
        </div>
    </aside>