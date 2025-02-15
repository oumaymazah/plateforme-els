document.addEventListener("click", function (event) {
    if (event.target.matches("#open-edit-role-modal")) {
        let editUrl = event.target.getAttribute('data-edit-url');
        fetch(editUrl)
            .then(response => response.text())
            .then(data => {
                // Créer un conteneur pour la modale
                let modalContainer = document.createElement('div');
                modalContainer.innerHTML = data;
                document.body.appendChild(modalContainer);

                // Initialiser la modale Bootstrap
                let modal = modalContainer.querySelector('.modal');
                let bsModal = new bootstrap.Modal(modal);
                bsModal.show();

                // Supprimer la modale après fermeture
                modal.addEventListener('hidden.bs.modal', function () {
                    modalContainer.remove();
                });

                // Attacher l'événement submit au formulaire
                let form = modal.querySelector('form');
                form.addEventListener('submit', function (event) {
                    event.preventDefault(); // Empêcher la soumission traditionnelle

                    let formData = new FormData(this);

                    fetch(this.action, {
                        method: this.method, // Doit être 'PUT' ou 'PATCH'
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': window.csrfToken,
                            'Accept': 'application/json', // Pour gérer les réponses JSON
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erreur réseau');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            showSuccessAlert(data.success); // Afficher l'alerte de succès
                            bsModal.hide(); // Fermer la modale
                            document.getElementById("load-roles").click(); // Recharger la liste des rôles
                        } else if (data.errors) {
                            // Afficher les erreurs de validation sous les champs
                            displayFormErrors(data.errors);
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        showErrorAlert('Une erreur est survenue lors de la modification du rôle.');
                    });
                });
            })
            .catch(error => console.error('Erreur lors du chargement de la modale :', error));
    }
});

// Fonction pour afficher les erreurs dans le formulaire
function displayFormErrors(errors) {
    // Réinitialiser les erreurs précédentes
    const errorElements = document.querySelectorAll('.invalid-feedback');
    errorElements.forEach(el => el.remove());

    // Afficher les erreurs sous les champs
    for (let field in errors) {
        const input = document.querySelector(`[name="${field}"]`);
        if (input) {
            // Ajouter la classe d'erreur et afficher le message
            input.classList.add('is-invalid');
            const errorMessage = document.createElement('div');
            errorMessage.classList.add('invalid-feedback');
            errorMessage.textContent = errors[field];
            input.parentNode.appendChild(errorMessage);
        }
    }
}

// Fonction générique pour afficher une alerte (success ou danger)
function showSuccessAlert(message) {
    let alertContainer = document.getElementById("alert-container");
    let alertSuccess = document.createElement("div");
    alertSuccess.className = "custom-alert alert alert-success alert-dismissible fade show d-flex align-items-center";
    alertSuccess.role = "alert";
    alertSuccess.innerHTML = `
        <span class="alert-icon">✅</span>
        <div class="alert-content">
            <div class="alert-message">${message}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    alertContainer.appendChild(alertSuccess);

    // Fermeture automatique après 5 secondes
    setTimeout(() => {
        alertSuccess.classList.remove("show"); // Cache avec animation
        setTimeout(() => alertSuccess.remove(), 500); // Supprime après animation
    }, 5000);
}

function showErrorAlert(message) {
    let alertContainer = document.getElementById("alert-container");
    let alertError = document.createElement("div");
    alertError.className = "custom-alert alert alert-danger alert-dismissible fade show d-flex align-items-center";
    alertError.role = "alert";
    alertError.innerHTML = `
        <span class="alert-icon">❌</span>
        <div class="alert-content">
            <div class="alert-message">${message}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    alertContainer.appendChild(alertError);

    // Fermeture automatique après 5 secondes
    setTimeout(() => {
        alertError.classList.remove("show"); // Cache avec animation
        setTimeout(() => alertError.remove(), 500); // Supprime après animation
    }, 5000);
}
