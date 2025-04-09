{{-- <div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel utilisateur</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark needs-validation" id="createUserForm" method="POST" action="{{ route('admin.users.store') }}" novalidate>
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-12 mt-0">
                            <label for="first_name">Prénom</label>
                            <input class="form-control" id="first_name" name="name" type="text" required placeholder="Prénom" autocomplete="off" />
                            <div class="invalid-feedback">Veuillez entrer un prénom.</div>
                        </div>
                        <div class="mb-3 col-md-12 mt-0">
                            <label for="last_name">Nom</label>
                            <input class="form-control" id="last_name" name="lastname" type="text" required placeholder="Nom" autocomplete="off" />
                            <div class="invalid-feedback">Veuillez entrer un nom.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="phone">Numéro de téléphone</label>

                                <div class="input-group">
                                    <span class="input-group-text" id="country-code">
                                        <i class="flag-icon flag-icon-tn"></i>
                                        <span class="ms-1">TN</span>
                                    </span>

                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                        placeholder="92 125 420"
                                        aria-describedby="country-code phoneHelpText"
                                        required
                                    >

                                    <div class="invalid-feedback">
                                        Veuillez entrer un numéro de téléphone valide.
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="mb-3 col-md-12 mt-0">
                            <label for="email">Adresse Email</label>
                            <input class="form-control" id="email" name="email" type="email" required autocomplete="off" />
                            <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                        </div>
                        <div class="mb-3 col-md-12 mt-0">
                            <label for="role_id">Rôle</label>
                            <select class="form-control" id="role_id" name="roles" required>
                                @if (auth()->user()->hasRole('admin'))

                                    @foreach ($roles as $role)
                                        @if ($role->name === 'professeur')
                                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                @elseif (auth()->user()->hasRole('super-admin'))
                                    <option value="" disabled selected>Sélectionnez un rôle</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">Veuillez sélectionner un rôle.</div>
                        </div>

                        <input type="hidden" name="password_auto_generate" value="1">
                    </div>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade modal-bookmark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel utilisateur</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark needs-validation" id="createUserForm" method="POST" action="{{ route('admin.users.store') }}" novalidate>
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-12 mt-0">
                            <div class="input-wrapper">
                                <label class="form-label" for="first_name">Prénom</label>
                                <div class="input-container">
                                    <i class="fas fa-signature input-icon"></i>
                                    <input class="form-control custom-input" id="first_name" name="name" type="text" required placeholder="Prénom" autocomplete="off" />
                                    <div class="invalid-feedback">Veuillez entrer un prénom.</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-md-12 mt-0">
                            <div class="input-wrapper">
                                <label class="form-label" for="last_name">Nom</label>
                                <div class="input-container">
                                    <i class="fas fa-user input-icon"></i>
                                    <input class="form-control custom-input" id="last_name" name="lastname" type="text" required placeholder="Nom" autocomplete="off" />
                                    <div class="invalid-feedback">Veuillez entrer un nom.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Nouvelle partie téléphone avec le design souhaité -->
                        <div class="mb-3 col-md-12">
                            <div class="input-wrapper">
                                <label class="form-label" for="phone">Numéro de téléphone</label>
                                <div class="input-group phone-group">
                                    <span class="input-group-text" id="country-code">
                                        <i class="flag-icon flag-icon-tn"></i>
                                        <span class="ms-1">TN</span>
                                    </span>
                                    <input
                                        type="tel"
                                        class="form-control phone-input"
                                        id="phone"
                                        name="phone"
                                        placeholder="92 125 420"
                                        aria-describedby="country-code phoneHelpText"
                                        required
                                    >
                                    <div class="invalid-feedback">Veuillez entrer un numéro de téléphone valide.</div>
                                </div>
                                <div class="hint-text">
                                    <i class="fas fa-info-circle hint-icon"></i> Format: 8 chiffres
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-md-12 mt-0">
                            <div class="input-wrapper">
                                <label class="form-label" for="email">Adresse Email</label>
                                <div class="input-container">
                                    <i class="fas fa-envelope input-icon"></i>
                                    <input class="form-control custom-input" id="email" name="email" type="email" required placeholder="exemple@email.com" autocomplete="off" />
                                    <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-md-12 mt-0">
                            <div class="input-wrapper">
                                <label class="form-label" for="role_id">Rôle</label>
                                <div class="input-container">
                                    <i class="fas fa-user-tag input-icon"></i>
                                    <select class="form-control custom-input" id="role_id" name="roles" required>
                                        @if (auth()->user()->hasRole('admin'))
                                            @foreach ($roles as $role)
                                                @if ($role->name === 'professeur')
                                                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        @elseif (auth()->user()->hasRole('super-admin'))
                                            <option value="" disabled selected>Sélectionnez un rôle</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">Veuillez sélectionner un rôle.</div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="password_auto_generate" value="1">
                    </div>
                    <div class="form-group mt-4 text-center">
                        <button class="btn btn-save" type="submit">
                            <i class="fas fa-save me-2"></i>Enregistrer
                        </button>
                        <button class="btn btn-secondary ms-2" type="button" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .input-wrapper {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        font-weight: 500;
        color: #4a4a4a;
        margin-bottom: 8px;
    }

    .input-container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #4361ee;
        font-size: 1rem;
        z-index: 1;
    }

    .custom-input {
        border-radius: 8px;
        padding: 12px 15px 12px 45px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
        width: 100%;
        font-size: 16px;
        color: #333;
        background-color: #fff;
    }

    .custom-input:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    /* Styles pour le nouveau groupe téléphone */
    .phone-group {
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e0e0e0;
    }

    .phone-group:focus-within {
        border-color: #4361ee;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    .phone-group .input-group-text {
        background-color: #f9f9f9;
        border: none;
        border-right: 1px solid #e0e0e0;
        color: #333;
        font-size: 16px;
        padding: 12px 15px;
    }

    .phone-group .flag-icon {
        font-size: 1rem;
    }

    .phone-input {
        border: none;
        padding: 12px 15px;
        font-size: 16px;
        color: #333;
        height: auto;
    }

    .phone-input:focus {
        outline: none;
        box-shadow: none;
        border: none;
    }

    .hint-text {
        font-size: 12px;
        color: #6c757d;
        margin-top: 6px;
        margin-left: 5px;
    }

    .hint-icon {
        font-size: 12px;
        margin-right: 5px;
    }

    .btn-save {
        background-color: #4361ee;
        color: white !important;
        border: none;
        padding: 12px 30px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }

    .btn-save:hover {
        background-color: #3951d0;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .btn-secondary {
        padding: 12px 30px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
    }

    /* Styles spécifiques pour l'affichage des messages d'erreur */
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: #dc3545;
    }

    .custom-input.is-invalid,
    .phone-input.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .was-validated .custom-input:invalid,
    .was-validated .phone-input:invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .was-validated .custom-input:invalid ~ .invalid-feedback,
    .was-validated .phone-input:invalid ~ .invalid-feedback,
    .custom-input.is-invalid ~ .invalid-feedback,
    .phone-input.is-invalid ~ .invalid-feedback {
        display: block;
    }

    @media (max-width: 768px) {
        .phone-group {
            width: 100%;
        }
    }
</style>
