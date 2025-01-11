<?php
    //require_once("connexion_bdd.php");
    require_once("../BDD/connexion_bdd_wamp_eric.php");

    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if (isset($username) || isset($password)) {
        $sql = "SELECT id_utilisateur, username, password FROM utilisateurs_site_TP WHERE username = ? AND password = ?;";
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
            // Récupérer le prénom
            $stmt->bind_result($id_utilisateur, $username, $password);
            $stmt->fetch();

            // Redirection
            header('Location: draft.html');

        } else {
            // Création d'un message d'erreur
            $errorMsg  = "Nom d'utilisateur ou mot de passe incorrect";
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link href="../CSS/style.css" rel="stylesheet" media="all">
    <link href="../CSS/inscription.css" rel="stylesheet" media="all">
</head>
<body>
    <header>
        <div class="logo">
            <a href="draft.html"><img src="../Annexes/logo_site.png" alt="Logo"></a>
        </div>
        <div class="title">
            <h1>Human Benchmark</h1>
        </div>
        <div class="buttons">
            <a href="inscription.html"><button>S'inscrire</button></a>
            <a href="connexion.html"><button>Se connecter</button></a>
        </div>
    </header>

    <main class="page-inscription">
        <h2 class="inscription">Connexion</h2>
        <form action="connexion.php" method="POST">
            
            <?php if (isset($errorMsg) && !empty($errorMsg)): ?>
                <p style="color: red;"><?php echo $errorMsg; ?></p>
            <?php endif; ?>
            
            <label for="username">Nom d'utilisateur * :</label><br><br>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Mot de passe * :</label><br><br>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Se connecter</button>
        </form>
    </main>
    <p class="mention">Champs marqués (*) obligatoires.<br>Les autres informations ne seront pas sauvegardés.</p>
    <script src="../JS/inscription.js"></script>
</body>
</html>