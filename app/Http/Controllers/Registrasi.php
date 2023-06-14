<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Registrasi extends Controller
{
    public function index()
    {
        return view('registrasi.index');
    }

    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'level' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        //proses enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        //proses insert ke database
        User::create($validatedData);

        //pindah ke form login dengan message success
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
