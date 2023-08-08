<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Role::create($validatedData);

        return redirect('/role')->with('success', 'Role berhasil ditambahkan');
    }

    public function edit($idRole)
    {
        $role = Role::find($idRole);

        $permissions = Permission::all();
        return view('roles.update', compact('role', 'permissions'));
    }

    public function update(Request $request, $idRole)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $role = Role::find($idRole);

        $role->update($validatedData);

        return redirect('/role')->with('success', 'Role berhasil diupdate');
    }

    public function destroy($idRole)
    {
        // make sure the user role admin cannot be deleted and only admin can delete role
        $role = Role::find($idRole);

        $role->delete();

        return redirect('/role')->with('success', 'Role berhasil dihapus');
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('success', 'Permission masih ada.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoked.');
        }
        return back()->with('success', 'Permission not exists.');
    }
}
