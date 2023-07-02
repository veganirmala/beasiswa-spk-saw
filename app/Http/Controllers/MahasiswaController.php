<?php

namespace App\Http\Controllers;

use App\Models\TahunUsulan;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data diurutkan dari yg terbaru DESC
        //$mahasiswa = Mahasiswa::with('tahunusulan', 'prodi')->latest()->paginate(5);
        $mahasiswa = DB::table('mahasiswa')
        ->join('tahunusulan', 'mahasiswa.idtahunusulan', '=', 'tahunusulan.id')
        ->join('prodi', 'mahasiswa.idprodi', '=', 'prodi.id')
        ->select('*')
        ->get();

        //tampilkan halaman index
        return view('mahasiswa/index', data: compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thusulan = TahunUsulan::all();
        $prodi = Prodi::all();
        return view('mahasiswa/create', compact('thusulan', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'idprodi' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
            'namaayah' => 'required',
            'pekerjaanayah' => 'required',
            'penghasilanayah' => 'required',
            'namaibu' => 'required',
            'pekerjaanibu' => 'required',
            'penghasilanibu' => 'required',
            'tanggungan' => 'required',
            'totalpenghasilan' => 'required',
            'namabank' => 'required',
            'norek' => 'required',
            'semester' => 'required',
            'idtahunusulan' => 'required'
        ]);

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa/show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $thusulan = TahunUsulan::all();
        $prodi = Prodi::all();
        return view('mahasiswa/update', compact('mahasiswa', 'thusulan', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'idprodi' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
            'namaayah' => 'required',
            'pekerjaanayah' => 'required',
            'penghasilanayah' => 'required',
            'namaibu' => 'required',
            'pekerjaanibu' => 'required',
            'penghasilanibu' => 'required',
            'tanggungan' => 'required',
            'totalpenghasilan' => 'required',
            'namabank' => 'required',
            'norek' => 'required',
            'semester' => 'required',
            'idtahunusulan' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $mahasiswa = Mahasiswa::find($id);

        $mahasiswa->update($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil dihapus !');
    }
}
