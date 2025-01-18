<!-- Page du jeu de réflexes -->
<?php 
    // OBLIGATOIRE DE START LA SESSION AU DEBUT DE CHAQUE PAGE PHP QUI L'UTILISE
    session_start();
?>

<!-- HEAD -->
<?php require_once("../Components/header.html"); ?>

<head>
    <link href="../CSS/jeu-reflexe.css" rel="stylesheet" media="all">
</head>

<!-- BODY -->
<body>

    <!-- NAVBAR -->
    <?php require_once("../Components/navbar.php"); ?>

    <div class="content">
        <main class="jeu-reflexe">
            <button id="reflButton">
                <img class="buttonImg" src="../Annexes/logo_reflexe.png">
                <p id="result">Quand la zone devient verte, cliquez n'importe où dans la zone aussi vite que possible.</p>
                <p id="troll-phrase">_________________________________________________</p>
                <b><p id="instruction">Cliquez dans la zone pour commencer...</p></b>
            </button>
            <div class="infos">
                <img class="stats" src="../Annexes/stats-reflexe.png">
                <p class="text">
                    Ce jeu est un simple outil de mesure de votre temps de réaction.<br><br>
                    Le temps de réaction médian est de 273 ms d'après les données collectées par <a href="https://humanbenchmark.com/tests/reactiontime" target="_blank">humanbenchmark.com</a>.<br><br>
                    Cependant, il est important de préciser que ce test, dû à sa précision, est affecté par la latence de votre matériel. 
                    Utiliser un matériel avec peu de latence augmentera sensiblement votre score.
                </p>
            </div>
        </main>
    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>

    <script src="../JS/jeu-reflexe.js"></script>
</body>
</html>