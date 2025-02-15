<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //affichier la page de roles
    public function index()
    {

        $roles = Role::query();
        if(auth()->user()->hasRole('admin')){
            $roles=$roles->whereNotIn('name',['super-admin','admin']);
        }
        elseif(auth()->user()->hasRole('super-admin')){
            $roles=$roles->whereNotIn('name',['super-admin']);
        }
        $roles = $roles->get();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        return view('admin.role.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $role = Role::where('name', $request->name)->first();
        if ($role) {
            return response()->json(['errors' => [
                'name' => 'Ce rôle existe déjà. Veuillez choisir un autre nom.'
            ]]); // Retourner un JSON
        }

        $role=Role::create(['name' => $request->name]);
        return response()->json(['success' => 'Role ajouté avec succès', 'role' => $role]);
    }
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        $validate=$request->validate([
            'name' => 'required'
        ]);
        $existingRole = Role::where('name', $validate['name'])->first();
        if ($existingRole && $existingRole->id !== $role->id) {//verifier si le role existe deja w idha l9ah lazmouu ykoun different de l'id mta3 role li 3andna
            return response()->json(['errors' => [
                'name' => 'Ce rôle existe déjà. Veuillez choisir un autre nom.'
            ]]); // Retourner un JSON
        }
        $role->update($validate);
        return response()->json(['success' => 'Rôle modifié avec succès']);
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Role supprimé avec succès');

    }

}
