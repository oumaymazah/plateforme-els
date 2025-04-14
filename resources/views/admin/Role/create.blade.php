{{-- <div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRoleModalLabel">Créer un rôle</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label for="roleName">Nom du rôle</label>
                            <input class="form-control" type="text" id="roleName" name="name" required placeholder="Nom du rôle" autocomplete="off">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}




<form id="create-role-form" action="{{ route('admin.roles.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="card shadow border-0 rounded-lg">
        <!-- Header avec un design moderne -->
        <div class="card-header bg-primary text-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 d-flex align-items-center">
                        <i class="fas fa-user-tag me-2"></i>Création d'un nouveau rôle
                    </h5>
                    <p class="mb-0 small opacity-75">Définissez un nouveau rôle pour les utilisateurs</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
        </div>

        <!-- Corps du formulaire -->
        <div class="card-body p-4">
            <div class="mb-4">
                <label for="name" class="form-label fw-bold">
                    <i class="fas fa-tag me-2 text-secondary"></i>Nom du rôle
                </label>
                <div class="input-group">
                    <span class="input-group-text bg-light d-flex justify-content-center" style="width: 45px;">
                        <i class="fas fa-id-badge text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" id="name" name="name"
                           placeholder="Ex: Administrateur, Éditeur, etc." required>
                    <div class="invalid-feedback">
                        Veuillez saisir un nom pour ce rôle.
                    </div>
                </div>
                <div class="form-text text-muted mt-2">
                    <i class="fas fa-info-circle me-1"></i> Le nom doit être unique et explicite sur les fonctions autorisées.
                </div>
            </div>


        </div>

        <!-- Footer avec boutons améliorés -->
        <div class="card-footer bg-light py-3">
            <div class="d-flex justify-content-end gap-3">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fas fa-save me-2"></i>Créer le rôle
                </button>
                <button type="button" class="btn btn-outline-secondary px-4 py-2" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i>Annuler
                </button>

            </div>
        </div>
    </div>
</form>
