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
            'name' => 'required|unique:roles,name',
        ]);
        Role::create(['name' => $request->name]);
        return redirect()->route('admin.roles.index')->with('success', 'Role ajouté avec succès');
    }
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        $validate=$request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);
        $role->update($validate);
        return redirect()->route('admin.roles.index')->with('success', 'Role modifié avec succès');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Role supprimé avec succès');
    }

}
