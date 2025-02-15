
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Gestion des Permissions</h5>
        <a  id="open-create-permission-modal" data-create-url="{{ route('admin.permissions.create') }}" class="btn btn-success">Créer un Nouveau Permission</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="permission-table">  <thead class="table-primary">
                    <tr>
                        <th scope="col">Nom du Permission</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td class="d-flex justify-content-around">
                            <a id="open-edit-permission-modal" data-edit-url="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce permission ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
