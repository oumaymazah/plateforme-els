
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

            <form action="{{ route('admin.users.roles.assignRole', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="role">Assigner un rôle :</label>
                    <select id="role" name="role" class="form-select">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assigner</button>
            </form>

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

            <form action="{{ route('admin.users.permissions.assign', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="permission">Assigner une permission :</label>
                    <select id="permission" name="permission" class="form-select">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assigner</button>
            </form>
        </div>
    </div>
</div>

