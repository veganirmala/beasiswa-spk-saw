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
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $ipk = DB::table('ipk')
                ->join('mahasiswa', 'ipk.nim', '=', 'mahasiswa.nim')
                ->select('*')
                ->where('ipk.nim', 'LIKE', '%' . $request->search . '%')
                ->get();
        } else {
            //mengambil semua data dan direlasikan ke tabel jurusan
            $ipk =
                DB::table('ipk')
                ->join('mahasiswa', 'ipk.nim', '=', 'mahasiswa.nim')
                ->select('*')
                ->get();
        }

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

        return redirect('/ipk')->with('success', 'Data IPK Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($nim)
    {
        $ipk = Ipk::join('mahasiswa', 'ipk.nim', '=', 'mahasiswa.nim')
            ->where('ipk.nim', $nim)
            ->select('ipk.*', 'mahasiswa.*')
            ->first();

        return view('ipk/show', compact('ipk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        //$ipk = Ipk::find($id);
        $ipk =
            Ipk::join('mahasiswa', 'ipk.nim', '=', 'mahasiswa.nim')
            ->where('ipk.nim', $nim)
            ->select('ipk.*', 'mahasiswa.*')
            ->first();
        $mhs = mahasiswa::all();
        return view('ipk/update', compact('mhs', 'ipk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nim)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nilai_ipk' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $ipk = Ipk::find($nim);

        $ipk->update($validatedData);

        return redirect('/ipk')->with('success', 'Data IPK Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nim)
    {
        $ipk = Ipk::find($nim);
        $ipk->delete();

        return redirect('/ipk')->with('success', 'Data IPK Berhasil dihapus !');
    }
}
