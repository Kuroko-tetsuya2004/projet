// Fonction pour vérifier l'email via AJAX
function checkEmail() {
    const email = document.getElementById('email').value;
    const emailMessage = document.getElementById('email-message');

    // Si l'email est vide, effacer le message et quitter
    if (email === '') {
        emailMessage.textContent = '';
        return;
    }

    // Envoyer une requête AJAX pour vérifier l'email
    fetch(`check_email.php?email=${encodeURIComponent(email)}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'exists') {
                emailMessage.textContent = 'Cet e-mail est déjà utilisé.';
                emailMessage.style.color = 'red';
            } else if (data.status === 'available') {
                emailMessage.textContent = 'Cet e-mail est disponible.';
                emailMessage.style.color = 'green';
            } else if (data.status === 'invalid') {
                emailMessage.textContent = 'Veuillez entrer une adresse e-mail valide.';
                emailMessage.style.color = 'red';
            } else {
                emailMessage.textContent = 'Une erreur s\'est produite.';
                emailMessage.style.color = 'red';
            }
        })
        .catch(error => {
            console.error('Erreur lors de la vérification de l\'e-mail :', error);
            emailMessage.textContent = 'Une erreur s\'est produite.';
            emailMessage.style.color = 'red';
        });
}

// Fonction pour valider le formulaire avant soumission
function validateForm() {
    const emailMessage = document.getElementById('email-message');
    const password = document.getElementById('mot-de-passe').value;
    const confirmPassword = document.getElementById('confirmer-mot-de-passe').value;
    const passwordError = document.getElementById('passwordError');

    // Vérifier si l'email est déjà utilisé
    if (emailMessage.textContent === 'Cet e-mail est déjà utilisé.') {
        alert('Veuillez utiliser une autre adresse e-mail.');
        return false; // Empêcher la soumission du formulaire
    }

    // Vérifier si les mots de passe correspondent
    if (password !== confirmPassword) {
        passwordError.style.display = 'block';
        return false; // Empêcher la soumission du formulaire
    } else {
        passwordError.style.display = 'none';
        return true; // Autoriser la soumission du formulaire
    }
}

// Valider en temps réel pendant la saisie du champ "Confirmer le mot de passe"
document.getElementById('confirmer-mot-de-passe').addEventListener('input', function () {
    const password = document.getElementById('mot-de-passe').value;
    const confirmPassword = document.getElementById('confirmer-mot-de-passe').value;
    const passwordError = document.getElementById('passwordError');

    // Afficher ou masquer le message d'erreur
    if (password !== confirmPassword) {
        passwordError.style.display = 'block';
    } else {
        passwordError.style.display = 'none';
    }
});