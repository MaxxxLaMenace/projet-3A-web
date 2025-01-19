<!-- Page du jeu de mémoire visuelle -->
<?php 
    // OBLIGATOIRE DE START LA SESSION AU DEBUT DE CHAQUE PAGE PHP QUI L'UTILISE
    session_start();
?>

<!-- HEAD -->
<?php require_once("../Components/header.html"); ?>

<head>
    <link href="../CSS/jeu-visuel.css" rel="stylesheet" media="all">
</head>

<!-- BODY -->
<body>
    
    <!-- NAVBAR -->
    <?php require_once("../Components/navbar.php"); ?>

    <div class="content">
        <main class="jeu-visuel">
            <div id="zone-jeu" class="zone-jeu">
                <div id="container-grille">
                    <h3 id="lvl">Retenez le motif qui va s'afficher<br>puis reproduisez le</h3>
                    <div id="grille" class="grille">
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid1" id="grid1"></button>
                        <button class="grid2" id="grid2"></button>
                        <button class="grid2" id="grid2"></button>
                        <button class="grid2" id="grid2"></button>
                        <button class="grid2" id="grid2"></button>
                        <button class="grid2" id="grid2"></button>
                        <button class="grid2" id="grid2"></button>
                        <button class="grid2" id="grid2"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                        <button class="grid3" id="grid3"></button>
                    </div>
                    <button id="submit">Commencer</button>
                </div>
            </div>
            <div class='infos'>
                <img class="stats" src="../Annexes/stats-visuel.png">
                <div>
                    <p class="text">
                        Ce jeu teste votre mémoire visuelle.<br><br>
                        La mémoire visuelle est une composante de la mémoire perceptive qui a pour fonction de retenir et traiter les informations visuelles.<br><br>
                        Il n'est pas rare d'entendre de la bouche de personnes qu'ils ou elles n'auraient pas "une bonne mémoire visuelle". En réalité, même si nous avons en effet 
                        tous des prédispositions différentes, nous avons tous une bonne mémoire visuelle !
                    </p>
                </div>  
            </div>    
        </main>
    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>
    
    <script src="../JS/jeu-visuel.js"></script>
</body>
</html>