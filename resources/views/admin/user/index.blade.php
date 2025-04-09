 {{-- <div class="card">
    <div class="card-header">
        <h5>Utilisateurs</h5>
    </div>
    <div class="card-block row">
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table table-styling" id="user-table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->roles->isNotEmpty())
                                {{ $user->roles->pluck('name')->implode(', ') }}
                                @else
                                    Aucun rôle
                                @endif
                            </td>
                            <td>
                                <div class="media">
                                    <div class="media-body text-end icon-state switch-outline" style="margin-right: 80px;">
                                        <label class="switch" style="transform: scale(0.7); ">
                                            <input type="checkbox" class="toggle-status" data-user-id="{{ $user->id }}" {{ $user->status === 'active' ? 'checked' : '' }}>
                                            <span class="switch-state bg-primary"></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>

                                <div class="col-sm-6 col-md-4 col-xl-3">
                                    <i class="fa fa-info-circle edit-user-icon action action-icon" data-editUser-url="{{ route('admin.users.roles', $user->id) }}" style="cursor: pointer;"></i>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl-3">
                                    <i class="icofont icofont-ui-delete delete-user-icon action-icon" data-deleteUser-url="{{ route('admin.users.destroy', $user->id) }}" data-csrf="{{ csrf_token() }}" style="cursor: pointer; color: rgb(204, 28, 28);"></i>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 --}}





 <div class="card">
    <div class="card-header">
        <h5>Liste des Utilisateurs</h5>
        <div class="row mt-3">
            <div class="col-md-4">
                <select class="form-select filter-select" id="role-filter" aria-label="Filtrer par rôle">
                    <option value="">Tous les rôles</option>
                    @foreach($allRoles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select filter-select" id="status-filter" aria-label="Filtrer par statut">
                    <option value="">Tous les statuts</option>
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="users-table" class="table data-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôles</th>
                        <th>Statut</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }} {{ $user->lastname ?? '' }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @forelse($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @empty
                                <span class="badge bg-secondary">Aucun rôle</span>
                            @endforelse
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input toggle-status-switch" type="checkbox"
                                       data-url="{{ route('admin.users.toggleStatus', $user) }}"
                                       id="status-{{ $user->id }}" {{ $user->status === 'active' ? 'checked' : '' }}>
                                {{-- <label class="form-check-label" for="status-{{ $user->id }}">
                                    {{ $user->status === 'active' ? 'Actif' : 'Inactif' }}
                                </label> --}}
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                        id="dropdownMenuButton-{{ $user->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-label="Actions pour {{ $user->name }}">
                                    <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $user->id }}">
                                    <li>
                                        <a class="dropdown-item view-user-roles" href="javascript:void(0)"
                                           data-url="{{ route('admin.users.roles', $user) }}">
                                            <i class="fas fa-eye me-2" aria-hidden="true"></i> Voir rôles
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item toggle-status-menu" href="javascript:void(0)"
                                           data-url="{{ route('admin.users.toggleStatus', $user) }}"
                                           data-status="{{ $user->status }}">
                                            <i class="fas fa-sync-alt me-2" aria-hidden="true"></i> Basculer en {{ $user->status === 'active' ? 'Inactif' : 'Actif' }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item delete-user" href="javascript:void(0)"
                                           data-url="{{ route('admin.users.destroy', $user) }}">
                                            <i class="fas fa-trash me-2" aria-hidden="true"></i> Supprimer
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun utilisateur trouvé</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .dropdown-toggle::after {
        display: none;
    }
    .dropdown-menu {
        min-width: 10rem;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .dropdown-item {
        padding: 0.35rem 1.5rem;
        font-size: 0.875rem;
    }
    .form-switch .form-check-input {
        width: 2.5em;
        height: 1.5em;
        cursor: pointer;
    }
    .btn-light {
        border: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    .dropdown-toggle {
        padding: 0.25rem 0.5rem;
    }
    .badge {
        margin-right: 3px;
    }
</style>
