<?php

namespace App\Http\Controllers;

use App\Models\JenisBeasiswa;
use Illuminate\Http\Request;

class JenisBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $jenisbeasiswa = JenisBeasiswa::where('jenisbeasiswa', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $jenisbeasiswa = JenisBeasiswa::latest()->paginate(5);
        }
        //tampilkan halaman index
        return view('jenisbeasiswa/index', data: compact('jenisbeasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisbeasiswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'jenisbeasiswa' => 'required'
        ]);

        JenisBeasiswa::create($validatedData);

        return redirect('/jenisbeasiswa')->with('success', 'Scholarship Type Data Successfully added !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jenisbeasiswa = JenisBeasiswa::find($id);
        return view('jenisbeasiswa/show', compact('jenisbeasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisbeasiswa = JenisBeasiswa::find($id);
        return view('jenisbeasiswa/update', compact('jenisbeasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'jenisbeasiswa' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $jenisbeasiswa = JenisBeasiswa::find($id);

        $jenisbeasiswa->update($validatedData);

        return redirect('/jenisbeasiswa')->with('success', 'Scholarship Type Data Successfully edited !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisbeasiswa = JenisBeasiswa::find($id);
        $jenisbeasiswa->delete();

        return redirect('/jenisbeasiswa')->with('success', 'Scholarship Type Data Successfully deleted !');
    }
}
