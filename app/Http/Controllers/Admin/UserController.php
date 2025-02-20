<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            $users = User::whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['super-admin', 'admin']);
            })->get();
        } elseif ($user->hasRole('super-admin')) {
            $users = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'super-admin');
            })->get();
        }

        return view('admin.user.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function show(User $user)
    {

        return view('admin.user.roles', compact('user'));
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return response()->json(['message' => 'Role supprimé avec succès.','success' => true]);
        }
        return response()->json(['message' => "Ce rôle n'existe pas pour cet utilisateur.",'danger' => true]);
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return response()->json(['message' => 'Permission supprimée avec succès.','success' => true]);
        }
        return response()->json(['message' => "Cette permission n'existe pas pour cet utilisateur.",'danger' => true], 404);
    }
    public function toggleStatus(User $user)
    {
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();
        return response()->json([
            'message' => 'Statut modifié avec succès.',
            'success' => true,
            'status' => $user->status
        ]);
    }

}
