<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Permission::create($validatedData);

        return redirect('/permission')->with('success', 'Permission berhasil ditambahkan');
    }

    public function edit($idPermission)
    {
        $roles = Role::all();
        $permission = Permission::find($idPermission);
        return view('permissions.update', compact('permission', 'roles'));
    }

    public function update(Request $request, $idPermission)
    {

        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $permission = Permission::find($idPermission);


        $permission->update($validatedData);

        return redirect('/permission')->with('success', 'Permission berhasil diupdate');
    }

    public function destroy($idPermission)
    {
        // make sure the user role admin cannot be deleted and only admin can delete role
        $permission = Permission::find($idPermission);

        $permission->delete();

        return redirect('/permission')->with('success', 'Permission berhasil dihapus');
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
}
