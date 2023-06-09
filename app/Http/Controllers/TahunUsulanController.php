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
        $tahunusulan =
            TahunUsulan::join('jenisbeasiswa', 'tahunusulan.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
            ->select('tahunusulan.*', 'jenisbeasiswa.jenisbeasiswa')
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
            'kuota' => 'required',
            'status' => 'required'
        ]);

        TahunUsulan::create($validatedData);

        return redirect('/tahunusulan')->with('success', 'Data Tahun Usulan Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$tahunusulan = TahunUsulan::find($id);
        $tahunusulan =
            TahunUsulan::join('jenisbeasiswa', 'tahunusulan.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
            ->where('tahunusulan.id', $id)
            ->select('tahunusulan.*', 'jenisbeasiswa.*')
            ->first();
        return view('tahunusulan/show', compact('tahunusulan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tahunusulan = TahunUsulan::join('jenisbeasiswa', 'tahunusulan.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
            ->where('tahunusulan.id', $id)
            ->select('tahunusulan.*', 'jenisbeasiswa.jenisbeasiswa')
            ->first();

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
            'kuota' => 'required',
            'status' => 'required',
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
