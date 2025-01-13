

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
                        <div class="position" id="position-reflexe"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <img src="../Annexes/logo_sequence.png" alt="Logo pour le jeu de mémoire de nombres">
                        <div class="position" id="position-sequence"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <img src="../Annexes/logo_visuel.png" alt="Logo pour le jeu de mémoire visuelle">
                        <div class="position" id="position-visuel"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>

</body>
</html>