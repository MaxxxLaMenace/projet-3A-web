function getRandomDelay(min, max) {
    return Math.floor(Math.random() * (max-min+1)) + min;
}


const minDelay = 5000;
const maxDelay = 10000;
const randomDelay = getRandomDelay(minDelay, maxDelay);
const start_button = document.getElementById("startButton");
const reflButton = document.getElementById('reflButton');
const result = document.getElementById('result');

let gameActive = false;
let time;

function calculeReflexe() {
    reflButton.style.background = 'green';
    gameActive = true;
    time = 0;
    time = Date.now();
    reflButton.addEventListener('click', () => {
        if (gameActive==true) {
            time = Date.now() - time;
            reflButton.style.background = 'red';
            console.log("tps de réaction : ", time);
            result.textContent = "Temps de réaction : " + time + "ms."
            reflButton.textContent = 'Cliquez sur le bouton "Commencer"'
            gameActive = false;
        }
    })
}


start_button.addEventListener('click', () => {
    setTimeout(calculeReflexe, randomDelay);
    reflButton.textContent = "Attendez la couleur verte..."
})
