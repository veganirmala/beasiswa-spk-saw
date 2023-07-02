<?php

namespace App\Http\Controllers;

use App\Models\TahunUsulan;
use App\Models\JenisBeasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunUsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data dan direlasikan ke tabel jurusan
        //$tahunusulan = TahunUsulan::with('jenisbeasiswa')->latest()->paginate(5); 
        $tahunusulan = DB::table('tahunusulan')
        ->join('jenisbeasiswa', 'tahunusulan.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
        ->select('*')
        ->get();
        //tampilkan halaman index
        return view('tahunusulan/index', data: compact('tahunusulan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = JenisBeasiswa::all();
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

        TahunUsulan::create($validatedData);

        return redirect('/tahunusulan')->with('success', 'Data Tahun Usulan Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tahunusulan = TahunUsulan::find($id);
        return view('tahunusulan/show', compact('tahunusulan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tahunusulan = TahunUsulan::find($id);
        $jenis = JenisBeasiswa::all();
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
        $tahunusulan = TahunUsulan::find($id);

        $tahunusulan->update($validatedData);

        return redirect('/tahunusulan')->with('success', 'Data Tahun Usulan Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tahunusulan = TahunUsulan::find($id);
        $tahunusulan->delete();

        return redirect('/tahunusulan')->with('success', 'Data Tahun Usulan Berhasil dihapus !');
    }
}
