
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Gestion des Rôles</h5>
        <a  id="open-create-role-modal" data-create-url="{{ route('admin.roles.create') }}" class="btn btn-success">Créer un Nouveau Rôle</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="roles-table">  <thead class="table-primary">
                    <tr>
                        <th scope="col">Nom du Rôle</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td class="d-flex justify-content-around">
                            <a id="open-edit-role-modal" data-edit-url="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rôle ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
