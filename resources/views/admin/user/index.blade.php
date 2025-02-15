<div class="card">
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex justify-content-around">

                                <a id="RoleUser" data-edit-url="{{ route('admin.users.roles', $user->id) }}" class="btn btn-outline-info-2x">Gérer les Accès</a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger-2x">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
