<?php
    require_once("../BDD/connexion_bdd.php");

    session_start();

    $id_utilisateur = $_SESSION['id_utilisateur'];
    $score_reflexe = 0;
    $score_sequence = 0;
    $score_visuel = 0;

    if (!isset($id_utilisateur)) {
        // Redirection vers la page de connexion
        header('Location: ./connexion.php');
        exit();
    }

    // Vérifier si un score existe déjà pour cet utilisateur
    $checkSql = "SELECT score FROM `score_reflexe` WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $id_utilisateur);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows>0) {
        // Récupérer les informations
        $stmt->bind_result($score_reflexe);
        $stmt->fetch();
    }

    // Vérifier si un score existe déjà pour cet utilisateur
    $checkSql = "SELECT score FROM `score_sequence` WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $id_utilisateur);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows>0) {
        // Récupérer les informations
        $stmt->bind_result($score_sequence);
        $stmt->fetch();
    }

    // Vérifier si un score existe déjà pour cet utilisateur
    $checkSql = "SELECT score FROM `score_visuel` WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $id_utilisateur);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows>0) {
        // Récupérer les informations
        $stmt->bind_result($score_visuel);
        $stmt->fetch();
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
                        <div class="position" id="position-reflexe"><?= $score_reflexe?></div>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <img src="../Annexes/logo_sequence.png" alt="Logo pour le jeu de mémoire de nombres">
                        <div class="position" id="position-sequence"><?= $score_sequence?></div>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <img src="../Annexes/logo_visuel.png" alt="Logo pour le jeu de mémoire visuelle">
                        <div class="position" id="position-visuel"><?= $score_visuel?></div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>

</body>
</html>