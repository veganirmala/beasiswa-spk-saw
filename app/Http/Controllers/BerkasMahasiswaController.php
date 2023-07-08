<?php

namespace App\Http\Controllers;

use App\Models\Berkasmahasiswa;
use Illuminate\Http\Request;

class BerkasMahasiswaController extends Controller
{
    public function index()
    {
        //mengambil semua data diurutkan dari yg terbaru DESC
        $berkasmahasiswa = Berkasmahasiswa::latest()->paginate(5);

        //tampilkan halaman index
        return view('berkasmahasiswa/index', data: compact('berkasmahasiswa'));
    }

    public function create()
    {
        return view('berkasmahasiswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //file yang diupload akan tersimpan di folder post images
        return $request->file('dokumenkhs')->store('post-images');
        return $request->file('dokumenpenghasilan')->store('post-images');
        return $request->file('dokumennilaiprestasi')->store('post-images');

        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'dokumenkhs' => 'image|file|max:1024',
            'dokumenpenghasilan' => 'image|file|max:1024',
            'dokumennilaiprestasi' => 'image|file|max:1024'
        ]);

        if ($request->file('dokumenkhs')) {
            $validatedData['dokumenkhs'] = $request->file('dokumenkhs')->store('post-images');
        }
        if ($request->file('dokumenpenghasilan')) {
            $validatedData['dokumenpenghasilan'] = $request->file('dokumenpenghasilan')->store('post-images');
        }
        if ($request->file('dokumennilaiprestasi')) {
            $validatedData['dokumennilaiprestasi'] = $request->file('dokumennilaiprestasi')->store('post-images');
        }

        Berkasmahasiswa::create($validatedData);

        return redirect('/berkasmahasiswa')->with('success', 'Data Berkas Mahasiswa Berhasil ditambahkan !');
    }
}
