<!-- HEAD -->
<?php require_once("../Components/header.php"); ?>

<head>
    <link href="../CSS/jeux.css" rel="stylesheet" media="all">
</head>

<!-- BODY -->
<body>

    <!-- NAVBAR -->
    <?php require_once("../Components/navbar.php"); ?>

    <div class="content">
        <main class="gamePage">
            <div class="titre-jeux"><h1>Choisissez votre entraînement</h1></div>
            <div class="choice">
                <div class="container">
                    <div class="image-container">
                        <a href="jeu-reflexe.php"><img src="../Annexes/logo_reflexe.png" alt="Logo pour le jeu des réflexes"></a>
                    </div>
                    <div class="text-spe">
                        <p>Testez vos rélflexes dans ce jeu dans lequel vous devrez cliquer le plus vite possible après le feu vert.</p>
                    </div>
                    <div class="bouton">
                        <a href="jeu-reflexe.php"><button>Jouer</button></a>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <a href="jeu-sequence.php"><img src="../Annexes/logo_sequence.png" alt="Logo pour le jeu de mémoire de nombres"></a>
                    </div>
                    <div class="text-spe">
                        <p>Testez votre mémoire instantannée dans ce jeu où vous devrez réécrire des nombres de plus en plus grand.</p>
                    </div>
                    <div class="bouton">
                        <a href="jeu-sequence.php"><button>Jouer</button></a>
                    </div>
                </div>
                <div class="container">
                    <div class="image-container">
                        <a href="jeu-visuel.php"><img src="../Annexes/logo_visuel.png" alt="Logo pour le jeu de mémoire visuelle"></a>
                    </div>
                    <div class="text-spe">
                        <p>Testez votre mémoire visuelle dans ce jeu où vous devrez reconstruire des patternes</p>
                    </div>
                    <div class="bouton">
                        <a href="jeu-visuel.php"><button>Jouer</button></a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>

</body>
</html>