{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Validation de votre compte</h4>
                </div>

                <div class="card-body">
                    <p class="text-center">
                        Un code de validation a été envoyé à votre adresse e-mail. <br>
                        Veuillez entrer ce code pour activer votre compte.
                    </p>

                    <!-- Afficher un message d'erreur si le code est incorrect -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <!-- Formulaire de validation -->
                    <form method="POST" action="{{ route('validation.code') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="validation_code">Code de validation</label>
                            <input type="text" class="form-control" id="validation_code" name="validation_code" required placeholder="Entrez le code">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Valider mon compte</button>
                        </div>
                    </form>

                    <hr>

                    <p class="text-center">
                        Vous n'avez pas reçu de code ? <br>
                        <a href="{{ route('resend.code') }}" class="btn btn-link">Renvoyer un code</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Messages de succès avec icône -->
            @if (session('success'))
                <div class="alert alert-success mb-4 shadow-sm fade-in">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Messages d'erreur avec icône -->
            @if (session('error'))
                <div class="alert alert-danger mb-4 shadow-sm fade-in">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <div class="card shadow border-0 rounded-lg">
                <!-- Force la couleur de fond de l'en-tête avec !important -->
                <div class="card-header text-white text-center py-4" style="background-color: #2B6ED4 !important;">
                    <h2 class="font-weight-bold mb-0">Réinitialisation du mot de passe</h2>
                </div>
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <!-- Modification de la couleur du SVG pour correspondre à #2B6ED4 -->
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#2B6ED4" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.708 2.825L15 11.105V5.383zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741zM1 11.105l4.708-2.897L1 5.383v5.722z"/>
                            </svg>
                        </div>
                        <h4 class="font-weight-bold">Vérification du code</h4>
                        <p class="text-muted">Un code a été envoyé à votre adresse email. Veuillez le saisir ci-dessous pour continuer.</p>
                    </div>

                    <!-- Affichage de toutes les erreurs de validation -->
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4 fade-in">
                            <div class="d-flex align-items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <strong>Veuillez corriger les erreurs suivantes:</strong>
                            </div>
                            <ul class="mb-0 ps-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('reset.password.verify') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="verification-code" class="form-label fw-bold">Code de vérification</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                    </svg>
                                </span>
                                <input type="text" id="verification-code" name="code" class="form-control form-control-lg @error('code') is-invalid @enderror" placeholder="Entrez le code à 6 chiffres" required autofocus>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div class="d-grid gap-2 mt-4">

                            <button type="submit" class="btn btn-lg verify-btn" style="background-color: #2B6ED4 !important; border-color: #2B6ED4 !important; color: #ffffff !important;">
                                <span class="d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shield-check me-2" viewBox="0 0 16 16">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                        <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    Vérifier le code
                                </span>
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                                <span class="d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Retour à la connexion
                                </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    
    .card-header {
        background-color: #2B6ED4 !important;
        color: #ffffff !important;
    }

    .card {
        background-color: #ffffff !important;
        transition: all 0.3s ease;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .form-control:focus {
        border-color: #2B6ED4 !important;
        box-shadow: 0 0 0 0.25rem rgba(43, 110, 212, 0.25) !important;
    }

    /* Assurer que le bouton principal est bien de couleur #2B6ED4 */
    .btn-primary, .verify-btn {
        background-color: #2B6ED4 !important;
        border-color: #2B6ED4 !important;
        color: #ffffff !important;
    }

    /* Supprimer la classe bg-primary qui pourrait être appliquée par Bootstrap */
    .bg-primary {
        background-color: #2B6ED4 !important;
    }

    .btn-outline-secondary {
        color: #6c757d !important;
        border-color: #6c757d !important;
    }

    .btn-primary:hover, .verify-btn:hover {
        background-color: #184a94 !important;
        border-color: #154283 !important;
    }

    /* Assurer que le texte est bien visible */
    h2, h4 {
        color: inherit !important;
    }

    .card-footer {
        background-color: #f8f9fa !important;
    }

    /* Éviter les problèmes de transparence */
    body, html {
        background-color: #f0f2f5 !important;
    }

    /* Animation pour les alertes */
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Styling amélioré pour les alertes */
    .alert {
        border-radius: 8px;
        border-left-width: 4px;
    }

    .alert-success {
        border-left-color: #28a745;
    }

    .alert-danger {
        border-left-color: #dc3545;
    }

    /* Améliorer l'affichage du champ de saisie invalide */
    .is-invalid {
        border-color: #dc3545 !important;
        background-image: none !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // Animation d'apparition
    document.addEventListener('DOMContentLoaded', function() {
        const card = document.querySelector('.card');
        card.style.opacity = 0;
        setTimeout(function() {
            card.style.opacity = 1;
        }, 100);

        // S'assurer que les éléments ont la bonne couleur même après le chargement
        document.querySelector('.card-header').style.backgroundColor = '#2B6ED4';
        const verifyBtn = document.querySelector('.verify-btn');
        if (verifyBtn) {
            verifyBtn.style.backgroundColor = '#2B6ED4';
            verifyBtn.style.borderColor = '#2B6ED4';
        }

        // Fermeture automatique des alertes après 5 secondes
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                if (alert) {
                    // Animation de disparition
                    alert.style.transition = 'all 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500);
                }
            }, 5000);
        });
    });

    // Focus automatique sur le champ de code
    document.getElementById('verification-code').focus();

    // Formatage automatique du code pendant la saisie (ajoute des espaces tous les 2 chiffres)
    document.getElementById('verification-code').addEventListener('input', function(e) {
        // Supprimer les espaces existants
        let value = e.target.value.replace(/\s/g, '');
        // Limite à 6 chiffres
        value = value.substring(0, 6);
        // Ajouter un espace après chaque groupe de 2 chiffres
        value = value.replace(/(\d{2})/g, '$1 ').trim();
        e.target.value = value;
    });
</script>
@endpush
