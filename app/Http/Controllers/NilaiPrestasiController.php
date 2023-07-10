<?php

namespace App\Http\Controllers;

use App\Models\NilaiPrestasi;
use App\Models\Mahasiswa;
use App\Models\JenisPrestasi;
use App\Models\TahunUsulan;
use App\Models\JenisBeasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data diurutkan dari yg terbaru DESC
        //$nilaiprestasi = NilaiPrestasi::latest()->paginate(5);
        $nilaiprestasi = DB::table('nilaiprestasi')
            ->join('mahasiswa', 'nilaiprestasi.nim', '=', 'mahasiswa.nim')
            ->join('tahunusulan', 'nilaiprestasi.id_usulan', '=', 'tahunusulan.id')
            ->join('jenisbeasiswa', 'nilaiprestasi.id_jenis_beasiswa', '=', 'jenisbeasiswa.id')
            ->select('*')
            ->get();

        //tampilkan halaman index
        return view('nilaiprestasi/index', data: compact('nilaiprestasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mhs = Mahasiswa::all();
        $tahunusulan = TahunUsulan::all();
        $jenisbeasiswa = JenisBeasiswa::all();
        return view('nilaiprestasi/create', compact('mhs', 'tahunusulan', 'jenisbeasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'total' => 'required',
            'id_usulan' => 'required',
            'id_jenis_beasiswa' => 'required'
        ]);

        NilaiPrestasi::create($validatedData);

        return redirect('/nilaiprestasi')->with('success', 'Data Nilai Prestasi Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($nim)
    {
        //$nilaiprestasi = NilaiPrestasi::find($id);
        $nilaiprestasi
            = NilaiPrestasi::join('jenisbeasiswa', 'nilaiprestasi.id_jenis_beasiswa', '=', 'jenisbeasiswa.id')
            ->join('tahunusulan', 'nilaiprestasi.id_usulan', '=', 'tahunusulan.id')
            ->join('mahasiswa', 'nilaiprestasi.nim', '=', 'mahasiswa.nim')
            ->where('nilaiprestasi.nim', $nim)
            ->select('nilaiprestasi.*', 'jenisbeasiswa.*', 'tahunusulan.*', 'mahasiswa.*')
            ->first();
        return view('nilaiprestasi/show', compact('nilaiprestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        //$nilaiprestasi = nilaiprestasi::find($id);
        $nilaiprestasi = NilaiPrestasi::join('jenisbeasiswa', 'nilaiprestasi.id_jenis_beasiswa', '=', 'jenisbeasiswa.id')
            ->join('tahunusulan', 'nilaiprestasi.id_usulan', '=', 'tahunusulan.id')
            ->join('mahasiswa', 'nilaiprestasi.nim', '=', 'mahasiswa.nim')
            ->where('nilaiprestasi.nim', $nim)
            ->select('nilaiprestasi.*', 'jenisbeasiswa.*',  'tahunusulan.*', 'mahasiswa.*')
            ->first();
        $mhs = Mahasiswa::all();
        $tahunusulan = TahunUsulan::all();
        $jenisbeasiswa = JenisBeasiswa::all();
        return view('nilaiprestasi/update', compact('nilaiprestasi', 'mhs',  'tahunusulan', 'jenisbeasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nim)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'total' => 'required',
            'id_usulan' => 'required',
            'id_jenis_beasiswa' => 'required'
        ]);

        $nilaiprestasi = NilaiPrestasi::find($nim);

        $nilaiprestasi->update($validatedData);

        return redirect('/nilaiprestasi')->with('success', 'Data Nilai Prestasi Berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nilaiprestasi = NilaiPrestasi::find($id);
        $nilaiprestasi->delete();

        return redirect('/nilaiprestasi')->with('success', 'Data Nilai Prestasi Berhasil dihapus !');
    }
}
