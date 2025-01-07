function getRandomDelay(min, max) {
    return Math.floor(Math.random() * (max-min+1)) + min;
}


const minDelay = 3000;
const maxDelay = 6000;
const randomDelay = getRandomDelay(minDelay, maxDelay);
const reflButton = document.getElementById('reflButton');
const result = document.getElementById('result');
const instruction = document.getElementById('instruction');
const troll = document.getElementById('troll-phrase');

const phrases = [
    "Tu peux mieux faire...",
    "Ma grand-mère est plus rapide que toi",
    "Mouais...",
    "T'as joué pour de vrai ?",
    "La prochaine fois est la bonne !",
    "Tu devrais réessayer...",
    "Non, ça ne vient pas de la latence de ta connexion",
    "La cause de la lenteur se situe entre ton ordinateur et ton siège"
]
let indexAlea;
let gameActive = 0;
let time;

function calculeReflexe() {
    reflButton.style.background = 'green';
    gameActive = 2;
    time = 0;
    time = Date.now();
    reflButton.addEventListener('click', () => {
        if (gameActive==2) {
            time = Date.now() - time;
            reflButton.style.background = '#48C6DA';
            result.textContent = time + " ms";
            indexAlea = Math.floor(Math.random()*phrases.length);
            troll.textContent = phrases[indexAlea];
            instruction.textContent = "Cliquez dans la zone pour commencer...";
            gameActive = 0;
        }
    })
}



reflButton.addEventListener('click', () => {
    if (gameActive==0) {
        gameActive = 1;
        setTimeout(calculeReflexe, randomDelay);
        reflButton.style.background = 'red';
        instruction.textContent = "Attendez la couleur verte...";
    }
})