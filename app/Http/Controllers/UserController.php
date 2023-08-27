<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $users = User::where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $users = User::latest()->paginate(5);
        }

        //tampilkan halaman index
        return view('user/index', data: compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:5|max:255',
            'jk' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);
        //proses enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/user')->with('success', 'User Data Successfully added !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user/show', compact('user'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::all();
        $permissions = Permission::all();

        return view('user/update', compact('user', 'roles', 'permissions'));
    }

    public function editProfile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('user/update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'jk' => 'required',
            'notelp' => 'required',
            'alamat' => 'required'
        ]);
        //proses enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        //mengambil data yg akan diupdate
        $user = User::find($id);

        $user->update($validatedData);

        return redirect('/user')->with('success', 'User Data Successfully edited !');
    }

    public function updateProfile(Request $request)
    {

        $id = Auth::id();
        $user = User::find($id);
        //membuat form validasi
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'jk' => 'required',
            'notelp' => 'required',
            'alamat' => 'required'
        ]);
        //proses enkripsi password
        // $validatedData['password'] = bcrypt($validatedData['password']);

        //mengambil data yg akan diupdate
        $user->update($validatedData);

        return redirect('/dashboard')->with('success', 'Profile Successfully edited !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user')->with('success', 'User Data Successfully deleted !');
    }
}
