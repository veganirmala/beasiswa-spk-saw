<?php

namespace App\Http\Controllers;

use App\Models\TahunUsulan;
use App\Models\JenisBeasiswa;
use App\Models\BobotKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $bobotkriteria = DB::table('bobotkriteria')
                ->join('tahunusulan', 'bobotkriteria.idtahunusulan', '=', 'tahunusulan.id')
                ->join('jenisbeasiswa', 'bobotkriteria.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
                ->select('*')
                ->where('tahun', 'LIKE', '%' . $request->search . '%')
                ->get();
        } else {
            //mengambil semua data
            $bobotkriteria = DB::table('bobotkriteria')
                ->join('tahunusulan', 'bobotkriteria.idtahunusulan', '=', 'tahunusulan.id')
                ->join('jenisbeasiswa', 'bobotkriteria.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
                ->select('*')
                ->get();
        }
        //tampilkan halaman index
        return view('bobotkriteria/index', data: compact('bobotkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thusulan = TahunUsulan::all();
        $jenis = JenisBeasiswa::all();
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

        BobotKriteria::create($validatedData);

        return redirect('/bobotkriteria')->with('success', 'Criteria Weight Data Successfully added !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$bobotkriteria = BobotKriteria::find($id);
        $bobotkriteria =
            BobotKriteria::join('tahunusulan', 'bobotkriteria.idtahunusulan', '=', 'tahunusulan.id')
            ->join('jenisbeasiswa', 'bobotkriteria.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
            ->where('bobotkriteria.id', $id)
            ->select('bobotkriteria.*', 'tahunusulan.*', 'jenisbeasiswa.*')
            ->first();
        return view('bobotkriteria/show', compact('bobotkriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bobotkriteria = BobotKriteria::join('tahunusulan', 'bobotkriteria.idtahunusulan', '=', 'tahunusulan.id')
            ->join('jenisbeasiswa', 'bobotkriteria.idjenisbeasiswa', '=', 'jenisbeasiswa.id')
            ->where('bobotkriteria.id', $id)
            ->select('bobotkriteria.*', 'tahunusulan.*', 'jenisbeasiswa.*')
            ->first();
        $thusulan = TahunUsulan::all();
        $jenis = JenisBeasiswa::all();
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
        $bobotkriteria = BobotKriteria::find($id);

        $bobotkriteria->update($validatedData);

        return redirect('/bobotkriteria')->with('success', 'Criteria Weight Data Successfully edited !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bobotkriteria = BobotKriteria::find($id);
        $bobotkriteria->delete();

        return redirect('/bobotkriteria')->with('success', 'Criteria Weight Data Successfully deleted !');
    }
}
