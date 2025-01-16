let level = 0;
let number;
let gameActive = 0;

const lvl = document.getElementById('lvl');
const submit = document.getElementById('submit');
const targetColor = 'rgb(62, 127, 77)';                             // couleur des boutons allumés
let gameIndices = [];
const zone_jeu = document.getElementById('zone-jeu');
const grille = document.querySelector('#grille');
const buttons = grille.querySelectorAll('button');
const grid2 = document.getElementById('grid2');
const grid3 = document.getElementById('grid3');

function timed_highlight(button) {
    // Fonction qui allume un bouton en vert avant de le remettre blanc

    button.style.background = "#3e7f4d";
    setTimeout(() => {
        button.style.background = "#ffffff";
    }, 1000);
}

function highlight(button) {
    // Fonction qui allume un bouton en vert ou le remet en blanc

    if (gameActive==1) {
        const bgColor = window.getComputedStyle(button).backgroundColor;
        if (bgColor===targetColor) {
            button.style.background = '#ffffff';
        }
        else {
            button.style.background = '#3e7f4d';
        }
    }
}

function randomNumbers(max, n) {
    // Fonction qui retourne n nombres aléatoires différents dans l'intervalle [1 ; max]

    const numbers = Array.from({ length: max}, (_, i) => i+1);          // créé la liste de 1 à max
    for (let i=numbers.length-1; i>0; i--) {
        const j = Math.floor(Math.random()*(i+1));
        [numbers[i], numbers[j]] = [numbers[j], numbers[i]];            // mélange la liste
    }
    return numbers.slice(0, n);                                         // retourne les n premiers éléments
}

function print_grille() {
    // Fonction qui assure le déroulement d'un niveau du jeu

    level += 1;
    zone_jeu.style.background = '#48C6DA';
    lvl.textContent = "Niveau "+level;
    submit.textContent = "Confirmer";
    const returnIndices = [];

    if (level<=3) {
        const indices = randomNumbers(9, level+2);
        indices.forEach(index => {
            timed_highlight(buttons[index-1]);
        })
        indices.forEach(index => {
            returnIndices.push(index);
        })
    }

    else if ((level>3) && (level<=6)) {
        grille.style.gridTemplateColumns = 'repeat(4, 25%)';
        for (let i=0; i<16; ++i) {
            buttons[i].style.width = '75px';
            buttons[i].style.height = '75px';
            buttons[i].style.display = 'block';
        }
        const indices = randomNumbers(16, level+1);
        indices.forEach(index => {
            timed_highlight(buttons[index-1]);
        })
        indices.forEach(index => {
            returnIndices.push(index);
        })
    }

    else if ((level>6) && (level<= 12)) {
        grille.style.gridTemplateColumns = 'repeat(5, 20%)';
        for (let i=0; i<25; ++i) {
            buttons[i].style.width = '60px';
            buttons[i].style.height = '60px';
            buttons[i].style.display = 'block';
        }
        const indices = randomNumbers(25, level);
        indices.forEach(index => {
            timed_highlight(buttons[index-1]);
        })
        indices.forEach(index => {
            returnIndices.push(index);
        })
    }

    else {
        const indices = randomNumbers(25, 12);
        indices.forEach(index => {
            timed_highlight(buttons[index-1]);
        })
        indices.forEach(index => {
            returnIndices.push(index);
        })
    }

    gameActive = 1;
    returnIndices.sort((a, b) => a - b);
    return returnIndices;
}

function verifReponse() {
    // Fonction qui vérifie la réponse du joueur

    const selectIndices = [];
    buttons.forEach((button, index) => {
        const bgColor = window.getComputedStyle(button).backgroundColor;
        if (bgColor===targetColor) {
            selectIndices.push(index+1);
        }
    })
    if ((gameIndices.length===selectIndices.length) && (gameIndices.every((value, index) => value === selectIndices[index]))) {
        console.log('correct');
        zone_jeu.style.background = 'green';
        submit.textContent = 'Continuer';
    }
    else {
        console.log('faux');
        zone_jeu.style.background = 'red';
        enregistrerScore(level - 1);
        level = 0;
        submit.textContent = 'Rejouer';
        lvl.textContent = 'Perdu !'
    }
    buttons.forEach(button => {
        button.style.background = '#ffffff';
    })
    console.log(selectIndices);
    console.log(gameIndices);
    gameActive = 0;
}



buttons.forEach(button => {
    button.addEventListener('click', () => {
        highlight(button);
    });
});

submit.addEventListener('click', () => {
    if (gameActive==0) {
        gameIndices = [];
        print_grille().forEach(index => {
            gameIndices.push(index);
        })
    }
    else {
        verifReponse();
    }
});

function enregistrerScore(score) {
    fetch('../BACK/enregistrer_score.php', {
        method: 'POST',
        body: JSON.stringify({ score: score, jeu: "visuel" }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            console.log('Score enregistré avec succès !');
        } else if (result.status == 'disconnected') {
            console.log('Utilisateur déconnecté');  
        } else {
            console.error('Erreur lors de l\'enregistrement');
        }
    })
    .catch(error => {
        console.error('Erreur réseau ou autre :', error);
    });
}