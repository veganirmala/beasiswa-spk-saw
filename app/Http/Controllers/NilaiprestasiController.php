<?php

namespace App\Http\Controllers;

use App\Models\Nilaiprestasi;
use App\Models\Mahasiswa;
use App\Models\Jenisprestasi;
use App\Models\Tahunusulan;
use App\Models\Jenisbeasiswa;
use Illuminate\Http\Request;

class NilaiprestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data diurutkan dari yg terbaru DESC
        $nilaiprestasi = Nilaiprestasi::latest()->paginate(5);
        
        //tampilkan halaman index
        return view('nilaiprestasi/index', data:compact('nilaiprestasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mhs = Mahasiswa::all();
        $jenisprestasi = Jenisprestasi::all();
        $tahunusulan = Tahunusulan::all();
        $jenisbeasiswa = Jenisbeasiswa::all();
        return view('nilaiprestasi/create', compact('mhs', 'jenisprestasi', 'tahunusulan','jenisbeasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'jenis_prestasi' => 'required',
            'skor' => 'required',
            'total' => 'required',
            'id_usulan' => 'required',
            'id_jenis_beasiswa' => 'required'
        ]);

        Nilaiprestasi::create($validatedData);
        
        return redirect ('/nilaiprestasi')->with('success', 'Data Nilai Prestasi Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nilaiprestasi = Nilaiprestasi::find($id);
        return view('nilaiprestasi/show', compact('nilaiprestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nilaiprestasi = Nilaiprestasi::find($id);
        $nilaiprestasi->delete();
        
        return redirect ('/nilaiprestasi')->with('success', 'Data Nilai Prestasi Berhasil dihapus !');
    }
}
