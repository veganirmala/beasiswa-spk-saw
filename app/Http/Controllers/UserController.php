<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data user diurutkan dari yg terbaru DESC
        $users = User::latest()->paginate(5);

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

        return redirect('/user')->with('success', 'Data User Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
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
            'email' => 'required',
            'password' => 'required',
            'jk' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);
        //proses enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        //mengambil data yg akan diupdate
        $user = User::find($id);

        $user->update($validatedData);

        return redirect('/user')->with('success', 'Data User Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user')->with('success', 'Data User Berhasil dihapus !');
    }
}
