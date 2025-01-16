<?php
    // Ce code PHP est exécuté si l'utilisateur à validé le formulaire d'inscription pour pouvoir le connecter puis le rediriger

    //require_once("connexion_bdd.php");
    require_once("../BDD/connexion_bdd.php");

    // Récupère les données envoyées par le formulaire
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $age = $_POST['age'] ?? null;
    $pays = $_POST['menu'] ?? null;
    $couleur_pref = $_POST['color'] ?? null;
    $telephone = $_POST['telephone'] ?? null;

    // Si l'utilisateur à validé le formulaire
    if (isset($username)) {

        // Requete pour ajouter l'utilisateur en question
        $sql = "INSERT INTO `utilisateurs` (`id_utilisateur`, `username`, `password`, `age`, `pays`, `couleur_pref`, `numero_tel`)
        VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            // Afficher l'erreur SQL si la préparation échoue
            die('Erreur de préparation de la requête : ' . $conn->error);
        }

        $stmt->bind_param("ssssss", $username, $password, $age, $pays, $couleur_pref, $telephone); // Sécurisation de la requête
        $stmt->execute();

        // Vérifier si l'insértion est réussie
        if ($stmt->affected_rows > 0)
        {
            // Création d'une session
            session_start();
            $_SESSION['id_utilisateur'] = $stmt->insert_id;
            $_SESSION['username'] = $username;

            // Redirection
            header('Location: ../index.php');
            exit();

        } else {
            // Création d'un message d'erreur
            $errorMsg  = "Création du compte impossible";
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    }
?>

<!-- HEAD -->
<?php require_once("../Components/header.html"); ?>

<head>
    <link href="../CSS/inscription.css" rel="stylesheet" media="all">
    <script src="../JS/inscription.js"></script>
</head>

<!-- BODY -->
<body>

    <!-- NAVBAR -->
    <?php require_once("../Components/navbar.php"); ?>

    <div class="content">

        <main class="page-inscription">

            <h2 class="inscription">Inscription</h2>

            <!-- FORMULAIRE -->
            <form class="formulaire" action="inscription.php" method="POST">

                <div class="field">
                    <div id="error-msg" style="color: red;"><?php if (isset($errorMsg) && !empty($errorMsg)): echo $errorMsg; endif;?></div>
                </div>

                <div class="field">
                    <label for="username">Nom d'utilisateur * :<br>(Entre 4 et 16 caractères)</label>
                    <input class="input-field" type="text" id="username" name="username" required>
                </div>

                <div class="field">
                    <label for="password">Mot de passe * :<br>(Minimum 6 caractères, 1 chiffre 1 majuscule)</label>
                    <input class="input-field" type="password" id="password" name="password" required>
                </div>

                <div class="field">
                    <div class="slide-container">
                        <label>Âge * :</label>
                        <div class="output" id="output">2 ans</div>
                        <input class="input-field" id="slider" name="slider" class="slider" type="range" min="0" max="4" value="1" step="1">
                        <input class="input-field" type="hidden" id="age" name="age" value="2">
                    </div>
                </div>

                <div class="field">
                    <div class="dropdown">
                        <label for="menu">Pays * :</label><br><br>
                        <select class="input-field" id="menu" name="menu">
                            <option value="--choisir--">--choisir--</option>
                            <option value="Mordor">Mordor</option>
                            <option value="Lune">Lune</option>
                            <option value="Atlantide">Atlantide</option>
                            <option value="Narnia">Narnia</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <div class="dropdown">
                        <label for="color">Couleur préférée * :</label><br><br>
                        <select class="input-field" id="color" name="color">
                            <option value="--choisir--">--choisir--</option>
                            <option value="Pizza">Pizza</option>
                            <option value="Banane">Banane</option>
                            <option value="Spider-man">Spider-man</option>
                            <option value="Chien saucisse">Chien saucisse</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <div class="slide-container">
                        <label>N° de téléphone * :</label>
                        <div class="phoneNumber" id="phoneNumber">07 99 99 99 99</div>
                        <input class="input-field" id="curseur" name="curseur" class="curseur" type="range" min="0" max="999999999" value="799999999" step="1">
                        <input class="input-field" type="hidden" id="telephone" name="telephone" value="07 99 99 99 99">
                    </div>
                </div>

                <div class="field">
                    <button type="submit">S'inscrire</button>
                </div>
            </form>
        </main>

        <p class="mention">Champs marqués (*) obligatoires.<br>Les autres informations ne seront pas sauvegardés.</p>

    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>
</body>
</html>