document.addEventListener("DOMContentLoaded", () => {
    const options = [
        "Embryon",
        "2 ans",
        "80 ans",
        "500 ans",
        "Décédé"
    ];

    const slider = document.getElementById("slider");
    const curseur = document.getElementById("curseur");
    const output = document.getElementById("output");
    const phoneNumber = document.getElementById("phoneNumber");
    const ageHidden = document.getElementById("age");
    const telephoneHidden = document.getElementById("telephone");

    // Met à jour la réponse quand le slider est déplacé
    slider.addEventListener("input", () => {
        const value = slider.value;
        output.textContent = options[value];
        ageHidden.value = options[value];
    });

    const formatPhoneNumber = (number) => {
        const numStr = number.toString().padStart(9, "0"); // Assure 9 chiffres (sans le "0" initial)
        return `0${numStr.slice(0, 1)} ${numStr.slice(1, 3)} ${numStr.slice(3, 5)} ${numStr.slice(5, 7)} ${numStr.slice(7)}`;
    };

    // Met à jour l'affichage du numéro en fonction de la position du slider
    curseur.addEventListener("input", () => {
        phoneNumber.textContent = formatPhoneNumber(curseur.value);
        telephoneHidden.value = formatPhoneNumber(curseur.value);
    });

    // Initialiser le numéro
    phoneNumber.textContent = formatPhoneNumber(curseur.value);
});