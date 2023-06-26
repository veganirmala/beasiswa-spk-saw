<?php

namespace App\Http\Controllers;

use App\Models\Jenisprestasi;
use Illuminate\Http\Request;

class JenisPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data diurutkan dari yg terbaru DESC
        $jenisprestasi = Jenisprestasi::latest()->paginate(5);
        
        //tampilkan halaman index
        return view('jenisprestasi/index', data:compact('jenisprestasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisprestasi/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'peringkat' => 'required',
            'jenisprestasi' => 'required',
            'tingkat' => 'required',
            'nilai' => 'required'
        ]);

        Jenisprestasi::create($validatedData);
        
        return redirect ('/jenisprestasi')->with('success', 'Data Jenis Prestasi Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jenisprestasi = Jenisprestasi::find($id);
        return view('jenisprestasi/show', compact('jenisprestasi'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisprestasi = Jenisprestasi::find($id);
        return view('jenisprestasi/update', compact('jenisprestasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'peringkat' => 'required',
            'jenisprestasi' => 'required',
            'tingkat' => 'required',
            'nilai' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $jenisprestasi = Jenisprestasi::find($id);

        $jenisprestasi->update($validatedData);
        
        return redirect ('/jenisprestasi')->with('success', 'Data Jenis Prestasi Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisprestasi = Jenisprestasi::find($id);
        $jenisprestasi->delete();

        return redirect('/jenisprestasi')->with('success', 'Data Jenis Prestasi Berhasil dihapus !');
    }
}
