<?php
    // Ce code PHP est exécuté si l'utilisateur à validé le formulaire de connexion pour pouvoir le connecter puis le rediriger

    //require_once("connexion_bdd.php");
    require_once("../BDD/connexion_bdd.php");

    // Récupère les données envoyées par le formulaire
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    // Si l'utilisateur à validé le formulaire
    if (isset($username) || isset($password)) {

        // Requete pour récupérer l'utilisateur en question
        $sql = "SELECT id_utilisateur, username, password FROM utilisateurs WHERE username = ? AND password = ?;";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            // Afficher l'erreur SQL si la préparation échoue
            die('Erreur de préparation de la requête : ' . $conn->error);
        }

        $stmt->bind_param("ss", $username, $password); // Sécurisation de la requête
        $stmt->execute();
        $stmt->store_result();

        // Vérifier si l'utilisateur existe
        if($stmt->num_rows>0)
        {
            // Récupérer les informations
            $stmt->bind_result($id_utilisateur, $username, $password);
            $stmt->fetch();

            // Création d'une session
            session_start();
            $_SESSION['id_utilisateur'] = $id_utilisateur;
            $_SESSION['username'] = $username;

            // Redirection
            header('Location: ../index.php');
            exit();

        } else {
            // Création d'un message d'erreur
            $errorMsg  = "Nom d'utilisateur ou mot de passe incorrect";
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    }
?>

<!-- HEAD -->
<?php require_once("../Components/header.html"); ?>

<head>
    <link href="../CSS/connexion.css" rel="stylesheet" media="all">
    <script src="../JS/inscription.js"></script>
</head>

<!-- BODY -->
<body>
    
    <!-- NAVBAR -->
    <?php require_once("../Components/navbar.php"); ?>

    <div class="content">
        <main class="page-inscription">

            <h2 class="inscription">Connexion</h2>

            <!-- FORMULAIRE -->
            <form class="formulaire" action="connexion.php" method="POST">
                
                <div class="field">
                    <?php if (isset($errorMsg) && !empty($errorMsg)): ?>
                        <p style="color: red;"><?php echo $errorMsg; ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="field">
                    <label for="username">Nom d'utilisateur * :</label>
                    <input class="input-field" type="text" id="username" name="username" required>
                </div>
                
                <div class="field">
                    <label for="password">Mot de passe * :</label>
                    <input class="input-field" type="password" id="password" name="password" required>
                </div>
                
                <div class="field">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </main>
        
        <p class="mention">Champs marqués (*) obligatoires.<br>Les autres informations ne seront pas sauvegardés.</p>

    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>
</body>
</html>

