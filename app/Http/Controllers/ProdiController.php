<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $prodi = DB::table('prodi')
                ->join('jurusan', 'prodi.idjurusan', '=', 'jurusan.id')
                ->select('*')
                ->where('namaprodi', 'LIKE', '%' . $request->search . '%')
                ->get();
        } else {
            //mengambil semua data dan direlasikan ke tabel jurusan
            $prodi = DB::table('prodi')
                ->join('jurusan', 'prodi.idjurusan', '=', 'jurusan.id')
                ->select('*')
                ->get();
        }
        //tampilkan halaman index
        return view('prodi/index', data: compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jur = Jurusan::all();
        return view('prodi/create', compact('jur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'namaprodi' => 'required',
            'jenjang' => 'required',
            'idjurusan' => 'required'
        ]);

        Prodi::create($validatedData);

        return redirect('/prodi')->with('success', 'Prodi Data Successfully added !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //$prodi = Prodi::find($id);

        $prodi = Prodi::join('jurusan', 'prodi.idjurusan', '=', 'jurusan.id')
            ->where('prodi.id', $id)
            ->select('prodi.*', 'jurusan.*')
            ->first();

        return view('prodi/show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prodi = Prodi::join('jurusan', 'prodi.idjurusan', '=', 'jurusan.id')
            ->where('prodi.id', $id)
            ->select('prodi.*', 'jurusan.namajurusan')
            ->first();
        $jur = Jurusan::all();
        return view('prodi/update', compact('prodi', 'jur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'namaprodi' => 'required',
            'jenjang' => 'required',
            'idjurusan' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $prodi = Prodi::find($id);

        $prodi->update($validatedData);

        return redirect('/prodi')->with('success', 'Prodi Data Successfully edited !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();

        return redirect('/prodi')->with('success', 'Prodi Data Successfully deleted !');
    }
}
