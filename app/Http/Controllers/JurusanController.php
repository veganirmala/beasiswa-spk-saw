<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //mengambil semua data diurutkan dari yg terbaru DESC
         $jurusan = Jurusan::latest()->paginate(5);
        
         //tampilkan halaman index
         return view('jurusan/index', data:compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'namajurusan' => 'required'
        ]);

        Jurusan::create($validatedData);
        
        return redirect ('/jurusan')->with('success', 'Data Jurusan Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jurusan = Jurusan::find($id);
        return view('jurusan/show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('jurusan/update', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         //membuat form validasi
         $validatedData = $request->validate([
            'namajurusan' => 'required|max:255'
        ]);

        //mengambil data yg akan diupdate
        $jurusan = Jurusan::find($id);

        $jurusan->update($validatedData);
        
        return redirect ('/jurusan')->with('success', 'Data Jurusan Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        
        return redirect ('/jurusan')->with('success', 'Data Jurusan Berhasil dihapus !');
    }
}
