<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    //

    public function index()
    {
        $permissions = Permission::query();

        if (auth()->user()->hasRole('admin')) {
            // Récupérer les permissions assignées UNIQUEMENT au Super Admin
            $superAdminOnlyPermissions = Permission::whereHas('roles', function ($query) {
                $query->where('name', 'super-admin');
            })->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })->pluck('id')->toArray();


            // Exclure ces permissions pour l'affichage de l'Admin
            $permissions = $permissions->whereNotIn('id', $superAdminOnlyPermissions);
        }

        $permissions = $permissions->get();

        return view('admin.permission.index', compact('permissions'));
    }



    public function create()
    {
        return view('admin.permission.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $permission = Permission::where('name', $request->name)->first();
        if ($permission) {
            return response()->json(['errors' => [
                'name' => 'Cette permission existe déjà. Veuillez choisir un autre nom.'
            ]]); // Retourner un JSON
        }
        $permission=Permission::create(['name' => $request->name]);
        return response()->json(['success' => 'permission ajouté avec succès', 'permission' => $permission]); // Retourner un JSON
    }
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit', compact('permission'));
    }
    public function update(Request $request,Permission $permission)
    {
        $validate=$request->validate([
            'name' => 'required'
        ]);
        $existingPermission = Permission::where('name', $validate['name'])->first();
        if ($existingPermission && $existingPermission->id !== $permission->id) {
            return response()->json(['errors' => [
                'name' => 'Cette permission existe déjà. Veuillez choisir un autre nom.'
            ]]); // Retourner un JSON
        }
        $permission->update($validate);
        return response()->json(['success' => 'Permission modifié avec succès']);
    }
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('success', 'Permission supprimé avec succès');

    }
}
