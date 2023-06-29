<?php

namespace App\Http\Controllers;

use App\Models\tahunusulan;
use App\Models\Jenisbeasiswa;
use Illuminate\Http\Request;

class TahunUsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data dan direlasikan ke tabel jurusan
        $tahunusulan = tahunusulan::with('jenisbeasiswa')->latest()->paginate(5);
        
        //tampilkan halaman index
        return view('tahunusulan/index', data:compact('tahunusulan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenisbeasiswa::all();
        return view('tahunusulan/create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'idjenisbeasiswa' => 'required',
            'tahun' => 'required',
            'kuota' => 'required'
        ]);

        tahunusulan::create($validatedData);
        
        return redirect ('/tahunusulan')->with('success', 'Data Tahun Usulan Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tahunusulan = tahunusulan::find($id);
        return view('tahunusulan/show', compact('tahunusulan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tahunusulan = tahunusulan::find($id);
        $jenis = Jenisbeasiswa::all();
        return view('tahunusulan/update', compact('tahunusulan', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'idjenisbeasiswa' => 'required',
            'tahun' => 'required',
            'kuota' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $tahunusulan = tahunusulan::find($id);

        $tahunusulan->update($validatedData);
        
        return redirect ('/tahunusulan')->with('success', 'Data Tahun Usulan Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tahunusulan = tahunusulan::find($id);
        $tahunusulan->delete();

        return redirect('/tahunusulan')->with('success', 'Data Tahun Usulan Berhasil dihapus !');
    }
}
