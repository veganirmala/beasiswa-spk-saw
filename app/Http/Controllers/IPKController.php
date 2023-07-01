<?php

namespace App\Http\Controllers;

use App\Models\Ipk;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class IPKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data dan direlasikan ke tabel jurusan
        $ipk = Ipk::with('mahasiswa')->latest()->paginate(5);

        //tampilkan halaman index
        return view('ipk/index', data: compact('ipk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mhs = Mahasiswa::all();
        return view('ipk/create', compact('mhs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'nilaiipk' => 'required'
        ]);

        Ipk::create($validatedData);

        return redirect('/ipk')->with('success', 'Data ipk Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ipk = Ipk::find($id);
        return view('ipk/show', compact('ipk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = mahasiswa::find($id);
        $ipk = Ipk::all();
        return view('ipk/update', compact('mahasiswa', 'ipk'));
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
        $ipk = Ipk::find($id);
        $ipk->delete();

        return redirect('/ipk')->with('success', 'Data IPK Berhasil dihapus !');
    }
}
