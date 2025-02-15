// document.addEventListener("click", function (event) {
//     if (event.target.matches("#open-create-role-modal")) {
//         let createUrl = event.target.getAttribute('data-create-url');
//         fetch(createUrl)
//             .then(response => response.text())
//             .then(data => {
//                 // Créer un conteneur pour la modale
//                 let modalContainer = document.createElement('div');
//                 modalContainer.innerHTML = data;
//                 document.body.appendChild(modalContainer);

//                 // Initialiser la modale Bootstrap
//                 let modal = modalContainer.querySelector('.modal');
//                 let bsModal = new bootstrap.Modal(modal);
//                 bsModal.show();

//                 // Supprimer la modale après fermeture
//                 modal.addEventListener('hidden.bs.modal', function () {
//                     modalContainer.remove();
//                 });

//                 // Gérer la soumission AJAX du formulaire
//                 modal.querySelector('form').addEventListener('submit', function (event) {
//                     event.preventDefault();

//                     let formData = new FormData(this);

//                     fetch(this.action, {
//                         method: this.method,
//                         body: formData,
//                         headers: {
//                             'X-CSRF-TOKEN': window.csrfToken,
//                             'Accept': 'application/json', // Pour gérer les réponses JSON
//                         }
//                     })
//                     .then(response => response.json())
//                     .then(data => {
//                         if (data.success) {
//                             showSuccessAlert(data.success); // Afficher l'alerte Bootstrap animée

//                             bsModal.hide(); // Fermer la modale
//                             document.getElementById("load-roles").click(); // Recharger la liste
//                         }
//                     })
//                     .catch(error => {
//                         console.error('Erreur:', error);
//                     });
//                 });
//             })
//             .catch(error => console.error('Erreur lors du chargement de la modale :', error));
//     }
// });


// function showSuccessAlert(message) {
//     let alertContainer = document.getElementById("alert-container");
//     let alertSuccess = document.createElement("div");
//     alertSuccess.className = "custom-alert alert alert-success alert-dismissible fade show d-flex align-items-center";
//     alertSuccess.role = "alert";
//     alertSuccess.innerHTML = `
//         <span class="alert-icon">✅</span>
//         <div class="alert-content">

//             <div class="alert-message">${message}</div>
//         </div>
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//     `;

//     alertContainer.appendChild(alertSuccess);

//     // Fermeture automatique après 5 secondes
//     setTimeout(() => {
//         alertSuccess.classList.remove("show"); // Cache avec animation
//         setTimeout(() => alertSuccess.remove(), 500); // Supprime après animation
//     }, 5000);
// }
document.addEventListener("click", function (event) {
    if (event.target.matches("#open-create-role-modal")) {
        let createUrl = event.target.getAttribute('data-create-url');
        fetch(createUrl)
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

                // Gérer la soumission AJAX du formulaire
                modal.querySelector('form').addEventListener('submit', function (event) {
                    event.preventDefault();

                    let formData = new FormData(this);

                    fetch(this.action, {
                        method: this.method,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': window.csrfToken,
                            'Accept': 'application/json', // Pour gérer les réponses JSON
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Si des erreurs de validation sont renvoyées
                        if (data.errors) {
                            // Afficher les erreurs dans le formulaire
                            displayFormErrors(data.errors);
                        } else if (data.success) {
                            showAlert('success', data.success); // Afficher l'alerte de succès
                            bsModal.hide(); // Fermer la modale
                            document.getElementById("load-roles").click(); // Recharger la liste
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
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
function showAlert(type, message) {
    let alertContainer = document.getElementById("alert-container");
    let alert = document.createElement("div");
    alert.className = `custom-alert alert alert-${type} alert-dismissible fade show d-flex align-items-center`;
    alert.role = "alert";
    alert.innerHTML = `
        <span class="alert-icon">${type === 'success' ? '✅' : '❌'}</span>
        <div class="alert-content">
            <div class="alert-message">${message}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    alertContainer.appendChild(alert);

    // Fermeture automatique après 5 secondes
    setTimeout(() => {
        alert.classList.remove("show"); // Cache avec animation
        setTimeout(() => alert.remove(), 500); // Supprime après animation
    }, 5000);
}
