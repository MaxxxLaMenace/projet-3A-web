<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-left">
            <div class="navbar-logo">
                <a href="../index.php">
                    <img src="../Annexes/logo.png" alt="Logo" />
                </a>
            </div>
            <div class="navbar-title">
                <a href="../index.php">
                    <h1>Human Benchmark 2</h1>
                </a>
            </div>
        </div>
        <?php 
            // Si le bouton "Se déconnecter" est cliqué
            if (isset($_POST['logout'])) {
                session_unset();
                session_destroy();
                header("Location: index.php");
                exit();
            }
            
            // Si l'utilisateur s'est connecté on affiche un menu différent
            if (isset($_SESSION['id_utilisateur'])) {
        ?>

            <div class="navbar-buttons">
                <form method="post" style="display:inline;">
                    <button type="submit" name="logout" class="btn">Se déconnecter</button>
                </form>
            </div>
            <div class="navbar-buttons-sm">
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>

        <?php 
            // Sinon on affiche le menu pour se connecter ou s'inscrire
            } else {
        ?>

            <div class="navbar-buttons">
                <a href="connexion.php" class="btn" id="login-btn">Se connecter</a>
                <a href="inscription.php" class="btn" id="signup-btn">S'inscrire</a>
            </div>
            <div class="navbar-buttons-sm">
                <a href="connexion.php" class="btn" id="login-btn"><i class="fa-solid fa-user"></i></a>
                <a href="inscription.php" class="btn" id="signup-btn"><i class="fa-solid fa-user-plus"></i></a>
            </div>

        <?php } ?>
        
    </div>
</nav>