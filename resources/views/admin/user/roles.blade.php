{{--
<div class="container mt-4 todo" id="roles_Permission">

    <div class="card">
        <div class="card-header">
            <h5>Informations de l'utilisateur</h5>
        </div>
        <div class="card-body">
            <h6><strong>Nom :</strong> {{ $user->name }}</h6>
            <h6><strong>Prénom :</strong> {{ $user->lastname }}</h6>
            <h6><strong>Email :</strong> {{ $user->email }}</h6>


            <hr>
            <h5>Rôles Actuels</h5>
            @if ($user->roles->isNotEmpty())
                <div class="todo-list-container mb-3">
                    <div class="todo-list-body">
                        <ul id="roles-list" class="todo-list">
                            @foreach($user->roles as $user_role)
                                <li class="task">
                                    <div class="task-container">
                                        <h4 class="task-label">{{ $user_role->name }}</h4>
                                        <span class="task-action-btn">
                                            <form method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <span class="action-box large delete-btn" title="Supprimer le rôle">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </form>
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p class="text-muted">Aucun rôle assigné.</p>
            @endif

            <hr>

            <h5>Permissions Actuelles</h5>
            @if ($user->permissions->isNotEmpty() || $user->roles->isNotEmpty())
                <div class="todo-list-container mb-3">
                    <div class="todo-list-body">
                        <ul id="permissions-list" class="todo-list">
                            @foreach($user->permissions as $user_permission)
                                <li class="task">
                                    <div class="task-container">
                                        <h4 class="task-label">{{ $user_permission->name }}</h4>
                                        <span class="task-action-btn">
                                            <form method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <span class="action-box large delete-btn" title="Supprimer la permission">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </form>
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                            @foreach ($user->roles as $role)
                                @foreach ($role->permissions as $permission)
                                    @if (!$user->permissions->contains($permission))
                                        <li class="task">
                                            <div class="task-container">
                                                <h4 class="task-label">{{ $permission->name }}</h4>
                                                <span class="task-action-btn">
                                                    <form method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $permission->id]) }}" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span class="action-box large delete-btn" title="Supprimer la permission">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                    </form>
                                                </span>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p class="text-muted">Aucune permission assignée.</p>
            @endif

        </div>
    </div>
</div>


 --}}




 <div class="container mt-4" id="roles_Permission">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Gestion des rôles pour {{ $user->name }}</h5>
            <button class="btn btn-secondary back-btn" data-back-tab="users">
                <i class="fas fa-arrow-left"></i> Retour
            </button>
        </div>
        <div class="card-body">
            <!-- Informations utilisateur -->
            <div class="user-info mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Nom :</strong> {{ $user->name }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Prénom :</strong> {{ $user->lastname }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Email :</strong> {{ $user->email }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Rôles attribués -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0"><i class="fas fa-user-tag me-2"></i>Rôles attribués</h6>
                        </div>
                        <div class="card-body p-0">
                            @if ($user->roles->isNotEmpty())
                                <ul class="list-group list-group-flush">
                                    @foreach($user->roles as $role)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $role->name }}</span>
                                        <a href="#" class="btn btn-sm btn-danger remove-role" title="Supprimer ce rôle" data-url="{{ route('admin.users.roles.remove', [$user->id, $role->id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-center p-3">
                                    <p class="text-muted mb-0">Aucun rôle assigné</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Toutes les permissions -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-info text-white">
                            <h6 class="mb-0"><i class="fas fa-key me-2"></i>Toutes les permissions</h6>
                        </div>
                        <div class="card-body p-0">

                            @if ($user->permissions->isNotEmpty() || $user->roles->isNotEmpty())
                                <ul class="list-group list-group-flush">
                                    @foreach($user->permissions as $user_permission)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span>{{ $user_permission->name }}</span>

                                        </div>
                                        <a href="#" class="btn btn-sm btn-danger revoke-permission" title="Révoquer cette permission" data-url="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" data-user-id="{{ $user->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </li>
                                    @endforeach

                                    @foreach ($user->roles as $role)
                                        @foreach ($role->permissions as $permission)
                                            @if (!$user->permissions->contains($permission))
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div >
                                                        <span>{{ $permission->name }}</span>

                                                    </div>
                                                    <a href="#" class="btn btn-sm btn-danger revoke-permission" title="Révoquer cette permission"
                                                        data-url="{{ route('admin.users.permissions.revoke', [$user->id, $permission->id]) }}" >
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                            </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-center p-3">
                                    <p class="text-muted mb-0">Aucune permission</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
