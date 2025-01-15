function getRandomNumber(min, max) {
    // Fonction qui retourne un nombre entier aléatoire entre min et max

    return Math.floor(Math.random() * (max-min+1)) + min;
}


let level = 0;
let number;
let time;

const textNum = document.getElementById('textNum');
const form = document.getElementById('reponse');
const startButton = document.getElementById('start');
const repButton = document.getElementById('boutonRep');
const zone_jeu = document.getElementById('zone-jeu');
const lvl = document.getElementById('lvl');
const progressBar = document.getElementById("progress-bar");


repButton.addEventListener('click', verifReponse);

form.addEventListener('keydown', function(event) {
    if (event.key==='Enter') {
        verifReponse(event);
    }
});


function verifReponse(event) {
    // Fonction qui vérifie la réponse donnée par le joueur quand le bouton submit est pressé

    event.preventDefault();
    progressBar.style.width = "0%";                             // barre de progression vide
    const userInput = document.getElementById('userInput').value;
    form.style.visibility = "hidden";                           // formulaire caché
    if (userInput==number) {
        textNum.textContent = "Correct !";
        zone_jeu.style.background = "green";                    // fond vert si réponse correcte
    }
    else {
        startButton.textContent = "Rejouer";                    // bouton start affiche "Rejouer" au lieu de "Continuer"
        textNum.innerHTML = "Perdu !<br>Le nombre était : "+number+"<br>Vous avez répondu : "+userInput;
        zone_jeu.style.background = "red";                      // fond rouge si mauvaise réponse
        enregistrerScore(level - 1);
        level = 0;
    }
    textNum.style.visibility = "visible";
    startButton.style.visibility = "visible";                   // affichage bouton start
}


startButton.addEventListener('click', () => {
    // Fonction qui lance le jeu ou la manche quand le bouton start est pressé

    form.reset();                                               // champ du formulaire remis à blanc
    zone_jeu.style.background = "#48C6DA";                      // fond bleu
    startButton.textContent = "Continuer";
    startButton.style.visibility = 'hidden';                    // bouton start caché
    level += 1;
    lvl.textContent = "Niveau " + level;
    lvl.style.visibility = "visible";
    number = getRandomNumber(10**(level-1), 10**level-1);       // génération aléatoire du nombre à n chiffres pour le n-ième niveau
    textNum.textContent = number;
    time = (1+(level/2))*1000                                   // tps d'affichage : 1 + n/2 secondes pour le n-ième niveau (délai idéal)
    setTimeout(()=>{
        textNum.style.visibility="hidden";                      // nombre caché
        form.style.visibility = 'visible';                      // formulaire de réponse affiché
        document.getElementById('userInput').focus();           // curseur automatiquement dans le champ
    }, time);
    startProgress(time-200);                                    // barre de progression (-200 dans le temps pour synchroniser la barre avec le délais)
})


function startProgress(duration) {
    // Fonction qui fait progresser la barre de temps en fonction d'une durée donnée

    let width = 0;                                              // début à 0%
    const interval = 100;                                       // fréquence de mise à jour (en millisecondes)
    const increment = (interval / duration) * 100;              // progression par intervalle
    const timer = setInterval(() => {
        width += increment;
        if (width >= 100) {
            clearInterval(timer);                               // arrête la barre à 100%
            width = 100;
            console.log("Temps écoulé !");
        }
        progressBar.style.width = `${width}%`;
    }, interval);
}

function enregistrerScore(score) {
    fetch('../BACK/enregistrer_score.php', {
        method: 'POST',
        body: JSON.stringify({ score: score, jeu: "sequence" }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            console.log('Score enregistré avec succès !');
        } else {
            console.error('Erreur lors de l\'enregistrement');
        }
    })
    .catch(error => {
        console.error('Erreur réseau ou autre :', error);
    });
}