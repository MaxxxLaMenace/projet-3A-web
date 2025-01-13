<?php 
    // OBLIGATOIRE DE START LA SESSION AU DEBUT DE CHAQUE PAGE PHP QUI L'UTILISE
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Human Benchmark : accueil</title>
    <link href="CSS/style.css" rel="stylesheet" media="all">
    <link href="CSS/accueil.css" rel="stylesheet" media="all">
    <link href="CSS/navbar.css" rel="stylesheet" media="all">
    <link href="CSS/footer.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-left">
                <div class="navbar-logo">
                    <a href="index.php">
                        <img src="Annexes/logo.png" alt="Logo" />
                    </a>
                </div>
                <div class="navbar-title">
                    <a href="index.php">
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
                    <a href="" class="btn" id="login-btn">Mon compte</a>
                    <form method="post" style="display:inline;">
                        <button type="submit" name="logout" class="btn">Se déconnecter</button>
                    </form>
                </div>
                <div class="navbar-buttons-sm">
                    <a href="" class="btn" id="login-btn"><i class="fa-solid fa-user"></i></a>
                    <a href="" class="btn" id="signup-btn"><i class="fa-solid fa-user-plus"></i></a>
                </div>

            <?php 
                // Sinon on affiche le menu pour se connecter ou s'inscrire
                } else {
            ?>

                <div class="navbar-buttons">
                    <a href="PAGES/connexion.php" class="btn" id="login-btn">Se connecter</a>
                    <a href="PAGES/inscription.php" class="btn" id="signup-btn">S'inscrire</a>
                </div>
                <div class="navbar-buttons-sm">
                    <a href="PAGES/connexion.php" class="btn" id="login-btn"><i class="fa-solid fa-user"></i></a>
                    <a href="PAGES/inscription.php" class="btn" id="signup-btn"><i class="fa-solid fa-user-plus"></i></a>
                </div>

            <?php } ?>
        </div>
    </nav>
    
    <div class="content">
        <main class="homePage">

            <?php 
                // Si l'utilisateur s'est connecté on affiche un menu différent
                if (isset($_SESSION['id_utilisateur'])) {
            ?>
                <div class="msgBienvenue">
                    <h1>Bonjour <?= $_SESSION['username'] ?> !</h1>
                </div>
            <?php } ?>
            <div class="accroche">
                <h1>Mesurez vos capacités cérébrales</h1>
            </div>
            <div class="choice">
                <div class="container">
                    <h2>Découvrez les différents jeux</h2>
                    <img src="Annexes/jeu.png" alt="Dessin représentant un jeu"><br>
                    <a href="PAGES/jeux.php"><button><b>Découvrir</b></button></a>
                </div>
                <div class="container">
                    <h2>Jettez un oeil à vos classements</h2>
                    <img src="Annexes/rank.png" alt="Dessin représentant un classement"><br>
                    <a href="PAGES/classement.php"><button><b>Découvrir</b></button></a>
                </div>
            </div>
            <div class="text">
                <p>Les preuves sicentifiques sont de plus en plus nombreuses à démontrer qu'il est possible d'augmenter significativement la probabilté de conserver
                    une bonne santé mentale et physique durant toute notre vie.<br>
                    L'exercice physique, une bonne alimentation, une vie sociale intense et une stimumation cognitive régulière jouent tous un rôle important dans 
                    l'assurance de maintenir longtemps son cerveau agile et performant.</p>
                <p>Plusieurs mécanismes physiologiques expliquent ce bénéfice lié à une vie intellectuelle intense :</p>
                <ol>
                    <li>Les neurones stimulés et donc actifs reçoivent plus d'oxygène et d'éléments nutritifs.</li>
                    <li>La stimulation neuronale multiplie le nombre de connexions synaptiques.</li>
                    <li>Des neurones actifs sécrètente le facteur de croissance neuronale indispensable à leur développement et leur survie.</li>
                    <li>La régénération des neurones à partir de cellules souches embryonnaires peut se produire durant l'âge adulte.</li>
                </ol>
                <p>En d'autre termes, l'activité mentale complexe apporterait un effet protecteur sur le cerveau, grâce à la création de réserves cognitive et 
                    cérébrale. Ces réserves correspondent à une augmentation du nombre de neurones et des connexions entre les neurones (contrairement à ce que 
                    l'on pensait auparavent, de nouveaux neurones pourraient naître à tout âge). De plus, cette réserve est également liée à un processus actif 
                    de plasticité neuronale qui permet d'optimiser ses performances soit par le recrutement d'autres régions cérébrales, soit par l'utilisation 
                    de nouvelles startégies cognitives.</p>
                <a href="https://www.happyneuron.fr/cerveau-et-entrainement/pourquoi-l-entrainement-cerebral" target="_blank">source : happyneuron.fr</a>
                <p>En résumé, entraîner son cerveau est un exercice bon à pratiquer à tout âge, afin de préserver ses neurones et ainsi retarder au maximum toute 
                    dégénéressence cognitive.</p>
            </div>
        </main>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-links">
                <ul>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">Conditions d'utilisation</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <a href="#" class="social-icon">Facebook</a>
                <a href="#" class="social-icon">Twitter</a>
                <a href="#" class="social-icon">Instagram</a>
            </div>
        </div>
    </footer>
</body>
</html>