// Formulaire d'inscription

document.addEventListener("DOMContentLoaded", () => {
    const options = [
        "Embryon",
        "2 ans",
        "80 ans",
        "500 ans",
        "Décédé"
    ];

    const ageSlider = document.getElementById("slider");
    const phoneSlider = document.getElementById("curseur");
    const output = document.getElementById("output");
    const phoneNumber = document.getElementById("phoneNumber");
    const ageHidden = document.getElementById("age");
    const phoneHidden = document.getElementById("telephone");

    // Met à jour la réponse quand le slider est déplacé
    ageSlider.addEventListener("input", () => {
        const value = slider.value;
        output.textContent = options[value];
        ageHidden.value = options[value];
    });

    const formatPhoneNumber = (number) => {
        const numStr = number.toString().padStart(9, "0"); // Assure 9 chiffres (sans le "0" initial)
        return `0${numStr.slice(0, 1)} ${numStr.slice(1, 3)} ${numStr.slice(3, 5)} ${numStr.slice(5, 7)} ${numStr.slice(7)}`;
    };

    // Met à jour l'affichage du numéro en fonction de la position du slider
    phoneSlider.addEventListener("input", () => {
        phoneNumber.textContent = formatPhoneNumber(phoneSlider.value);
        phoneHidden.value = formatPhoneNumber(phoneSlider.value);
    });

    // Initialiser le numéro
    phoneNumber.textContent = formatPhoneNumber(curseur.value);

    // ----------------------- VALIDATION DU FORMULAIRE ----------------------

    const form = document.querySelector(".formulaire");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const countrySelect = document.getElementById("menu");
    const colorSelect = document.getElementById("color");
    const errorMsgContainer = document.getElementById("error-msg");
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

    form.addEventListener("submit", function (event) {
        const password = passwordInput.value;
        let isValid = true;
        let errorMessage = "";

        // Validation du nom d'utilisateur (4 à 16 caractères)
        const username = usernameInput.value.trim();
        if (username.length < 4 || username.length > 16) {
            isValid = false;
            errorMessage += "Le nom d'utilisateur doit contenir entre 4 et 16 caractères.\n";
        }

        // Validation du mot de passe (minimum 6 caractères, 1 chiffre, 1 majuscule)
        else if (!passwordRegex.test(password)) {
            isValid = false;
            errorMessage += "Le mot de passe doit contenir au moins 6 caractères, une majuscule et un chiffre.<br>";
        }

        // Validation du pays sélectionné
        else if (countrySelect.value === "--choisir--") {
            isValid = false;
            errorMessage += "Veuillez choisir un pays.\n";
        }

        // Validation de la couleur préférée
        else if (colorSelect.value === "--choisir--") {
            isValid = false;
            errorMessage += "Veuillez choisir une couleur préférée.\n";
        }

        // Empêcher l'envoi du formulaire si invalide
        if (!isValid) {
            errorMsgContainer.innerHTML = errorMessage;
            event.preventDefault();
        }
    });
});