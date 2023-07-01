<?php

namespace App\Http\Controllers;

use App\Models\tahunusulan;
use App\Models\Jenisbeasiswa;
use App\Models\Bobotkriteria;
use Illuminate\Http\Request;

class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data diurutkan dari yg terbaru DESC
        $bobotkriteria = Bobotkriteria::with('tahunusulan','jenisbeasiswa')->latest()->paginate(5);
        
        //tampilkan halaman index
        return view('bobotkriteria/index', data:compact('bobotkriteria'));
        //return view('bobotkriteria/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thusulan = tahunusulan::all();
        $jenis = jenisbeasiswa::all();
        return view('bobotkriteria/create', compact('thusulan', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'idtahunusulan' => 'required',
            'idjenisbeasiswa' => 'required',
            'bobotkriteriaipk' => 'required',
            'bobotkriteriaprestasi' => 'required',
            'bobotkriteriapenghasilan' => 'required'
        ]);

        Bobotkriteria::create($validatedData);
        
        return redirect ('/bobotkriteria')->with('success', 'Data Bobot Kriteria Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bobotkriteria = Bobotkriteria::find($id);
        return view('bobotkriteria/show', compact('bobotkriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bobotkriteria = bobotkriteria::find($id);
        $thusulan = tahunusulan::all();
        $jenis = jenisbeasiswa::all();
        return view('bobotkriteria/update', compact('bobotkriteria', 'thusulan', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'idtahunusulan' => 'required',
            'idjenisbeasiswa' => 'required',
            'bobotkriteriaipk' => 'required',
            'bobotkriteriaprestasi' => 'required',
            'bobotkriteriapenghasilan' => 'required'
        ]);


        //mengambil data yg akan diupdate
        $bobotkriteria = bobotkriteria::find($id);

        $bobotkriteria->update($validatedData);
        
        return redirect ('/bobotkriteria')->with('success', 'Data Bobot Kriteria Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bobotkriteria = bobotkriteria::find($id);
        $bobotkriteria->delete();

        return redirect('/bobotkriteria')->with('success', 'Data Bobot Kriteria Berhasil dihapus !');
    }
}
