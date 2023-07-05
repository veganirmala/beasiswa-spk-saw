<?php

namespace App\Http\Controllers;

use App\Models\Ipk;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IPKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data dan direlasikan ke tabel jurusan
        //$ipk = Ipk::with('mahasiswa')->latest()->paginate(5);
        $ipk = DB::table('ipk')
        ->join('mahasiswa', 'ipk.nim', '=', 'mahasiswa.id')
        ->select('*')
        ->get();

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
            'nilai_ipk' => 'required'
        ]);

        IPK::create($validatedData);

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
        $ipk = ipk::find($id);
        $mhs = mahasiswa::all();
        return view('ipk/update', compact('mhs', 'ipk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'nilai_ipk' => 'required'
        ]);
        
        $ipk = IPK::find($id);

        $ipk->update($validatedData);
        return redirect('/ipk')->with('success', 'Data IPK Berhasil diubah !');
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
