<!-- HEAD -->
<?php require_once("../Components/header.php"); ?>

<head>
    <link href="../CSS/sequence-game.css" rel="stylesheet" media="all">
</head>

<!-- BODY -->
<body>

    <!-- NAVBAR -->
    <?php require_once("../Components/navbar.php"); ?>

    <div class="content">
        <main class="jeu-sequence">
            <div id="zone-jeu" class="zone-jeu">
                <img src="../Annexes/logo_sequence.png" alt="Logo du jeu de mémoire">
                <div class="textJeu">
                    <h1 id="lvl" class="lvl">Level 0</h1>
                    <h2 id="textNum">Mémorisez le nombre qui apparaitra ici<br><br>Cliquez sur le bouton pour commencer...</h2>
                    <button id="start">Commencer</button>
                    <form id="reponse" class="reponse">
                        <label for="userInput">Entrez votre réponse :</label><br><br>
                        <input type="number" id="userInput" name="userInput" required><br><br>
                        <button type="button" id="boutonRep">Soumettre</button>
                    </form>
                    <div id="progress-container">
                        <div id="progress-bar"></div>
                    </div>                
                </div>
            </div>
            <div class="infos">
                <img class="stats" src="../Annexes/stats-sequence.png">
                <div class="text">
                    <p>
                        Ce jeu teste votre mémoire à court terme.<br><br>
                        En général, une personne moyenne est capable de retenir seulement 7 chiffres. Mais il est possible d'augmenter considérablement ce résultat en utilisant 
                        des moyens mnémotechniques.<br><br>
                        La vidéo ci-dessous montre qu'il est possible de retenir une séquence composée de milliers de chiffres ! 
                    </p>
                    <p>Source :<a href="https://www.youtube.com/@FabienOlicard" target="_blank">Fabien Olicard</a></p>
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <iframe 
                            width="560" 
                            height="315" 
                            src="https://www.youtube.com/embed/XMdYpuTin6A?si=yG0NUE2mYrnO0aPN&amp;start=11" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            referrerpolicy="strict-origin-when-cross-origin" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- BAS DE PAGE -->
    <?php require_once("../Components/footer.html"); ?>
    
    <script src="../JS/jeu-sequence.js"></script>
</body>
</html>