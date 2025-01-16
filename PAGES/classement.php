<?php
    require_once("../BDD/connexion_bdd.php");

    session_start();

    $id_utilisateur = $_SESSION['id_utilisateur'];
    $score_reflexe = 0;
    $classement_reflexe = 0;
    $score_sequence = 0;
    $classement_sequence = 0;
    $score_visuel = 0;
    $classement_visuel = 0;

    if (!isset($id_utilisateur)) {
        // Redirection vers la page de connexion
        header('Location: ./connexion.php');
        exit();
    }

    // -------------- SCORE REFLEXE  --------------------
    // Vérifie si l'utilisateur existe
    $checkSql = "SELECT count(*) as utilisateur_existe, score FROM `score_reflexe` WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $id_utilisateur);
    $stmt->execute();
    $stmt->store_result();

    // Récupérer les informations
    $stmt->bind_result($joue_reflexe, $score_reflexe);
    $stmt->fetch();

    // Si il existe récupère son score
    if ($joue_reflexe == 1) {
        $scoreSql = "SELECT count(*) as classement FROM score_reflexe WHERE score < (SELECT score FROM score_reflexe WHERE id_utilisateur = ?)";
        $stmt = $conn->prepare($scoreSql);
        $stmt->bind_param("s", $id_utilisateur);
        $stmt->execute();
        $stmt->store_result();

        // Récupérer les informations
        $stmt->bind_result($classement_reflexe);
        $stmt->fetch();
        $classement_reflexe += 1;
    }
    
    // -------------- SCORE SEQUENCE  --------------------
    // Vérifie si l'utilisateur existe
    $checkSql = "SELECT count(*) as utilisateur_existe, score FROM `score_sequence` WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $id_utilisateur);
    $stmt->execute();
    $stmt->store_result();

    // Récupérer les informations
    $stmt->bind_result($joue_sequence, $score_sequence);
    $stmt->fetch();

    // Si il existe récupère son score
    if ($joue_sequence == 1) {
        $scoreSql = "SELECT count(*) as classement FROM score_sequence WHERE score > (SELECT score FROM score_sequence WHERE id_utilisateur = ?)";
        $stmt = $conn->prepare($scoreSql);
        $stmt->bind_param("s", $id_utilisateur);
        $stmt->execute();
        $stmt->store_result();

        // Récupérer les informations
        $stmt->bind_result($classement_sequence);
        $stmt->fetch();
        $classement_sequence += 1;
    }

    // -------------- SCORE VISUEL  --------------------
    // Vérifie si l'utilisateur existe
    $checkSql = "SELECT count(*) as utilisateur_existe, score FROM `score_visuel` WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $id_utilisateur);
    $stmt->execute();
    $stmt->store_result();

    // Récupérer les informations
    $stmt->bind_result($joue_visuel, $score_visuel);
    $stmt->fetch();

    // Si il existe récupère son score
    if ($joue_visuel == 1) {
        $scoreSql = "SELECT count(*) as classement FROM score_visuel WHERE score > (SELECT score FROM score_visuel WHERE id_utilisateur = ?)";
        $stmt = $conn->prepare($scoreSql);
        $stmt->bind_param("s", $id_utilisateur);
        $stmt->execute();
        $stmt->store_result();

        // Récupérer les informations
        $stmt->bind_result($classement_visuel);
        $stmt->fetch();
        $classement_visuel += 1; 
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
?>

<!-- HEAD -->
<?php require_once("../Components/header.html"); ?>

<head>
    <link href="../CSS/classement.css" rel="stylesheet" media="all">
</head>

<!-- BODY -->
<body>

    <!-- NAVBAR -->
    <?php require_once("../Components/navbar.php"); ?>

    <div class="content">
        <main class="gamePage">
            <div class="titre-jeux"><h1>Classements</h1></div>
            <div class="choice">
                <div class="container">
                    <div class="image-container">
                        <img src="../Annexes/logo_reflexe.png" alt="Logo pour le jeu des réflexes">
                        <div class="classement" id="classement-reflexe"><strong>Classement:</strong> <?php if ($classement_reflexe != 0) echo $classement_reflexe; else echo "Non classé";?></div>
                        <div class="score" id="score-reflexe"><strong>Score:</strong> <?php if ($score_reflexe != 0) echo $score_reflexe." ms"; else echo "Pas de score";?></div>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <img src="../Annexes/logo_sequence.png" alt="Logo pour le jeu de mémoire de nombres">
                        <div class="classement" id="classement-sequence"><strong>Classement:</strong> <?php if ($classement_sequence != 0) echo $classement_sequence; else echo "Non classé";?></div>
                        <div class="score" id="score-sequence"><strong>Score:</strong> <?php if ($score_sequence != 0) echo "Level ".$score_sequence; else echo "Pas de score";?></div>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <img src="../Annexes/logo_visuel.png" alt="Logo pour le jeu de mémoire visuelle">
                        <div class="classement" id="classement-visuel"><strong>Classement:</strong> <?php if ($classement_visuel != 0) echo $classement_visuel; else echo "Non classé";?></div>
                        <div class="score" id="score-visuel"><strong>Score:</strong> <?php if ($score_visuel != 0) echo "Level ".$score_visuel; else echo "Pas de score";?></div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>

</body>
</html>