<?php

namespace App\Http\Controllers;

use App\Models\BerkasMahasiswa;
//use App\Controller\Storage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\Storage;

class BerkasMahasiswaController extends Controller
{
    public function index()
    {
        //mengambil semua data diurutkan dari yg terbaru DESC
        $berkasmahasiswa = BerkasMahasiswa::latest()->paginate(5);

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
        $validatedData = $request->validate([
            'nim' => 'required',
            'dokumenkhs' => 'required|file|mimes:pdf',
            'dokumenpenghasilan' => 'required|file|mimes:pdf',
            'dokumennilaiprestasi' => 'required|file|mimes:pdf',
        ]);

        // Process other form data if needed
        $nim = $request->input('nim');

        // Store the files
        if ($request->hasFile('dokumenkhs')) {
            $dokumenkhs = $request->file('dokumenkhs');
            $dokumenkhsName = $nim . '_dokumenkhs.pdf';
            $dokumenkhs->storeAs('uploads', $dokumenkhsName);
        }

        if ($request->hasFile('dokumenpenghasilan')) {
            $dokumenpenghasilan = $request->file('dokumenpenghasilan');
            $dokumenpenghasilanName = $nim . '_dokumenpenghasilan.pdf';
            $dokumenpenghasilan->storeAs('uploads', $dokumenpenghasilanName);
        }

        if ($request->hasFile('dokumennilaiprestasi')) {
            $dokumennilaiprestasi = $request->file('dokumennilaiprestasi');
            $dokumennilaiprestasiName = $nim . '_dokumennilaiprestasi.pdf';
            $dokumennilaiprestasi->storeAs('uploads', $dokumennilaiprestasiName);
        }

        // Store the data in the database
        $berkasmahasiswa = BerkasMahasiswa::create([
            'nim' => $nim,
            'dokumenkhs' => $dokumenkhsName,
            'dokumenpenghasilan' => $dokumenpenghasilanName,
            'dokumennilaiprestasi' => $dokumennilaiprestasiName,
        ]);

        // Perform any other necessary database operations or tasks

        return redirect('/berkasmahasiswa')->with('success', 'Data Berkas Mahasiswa Berhasil ditambahkan !');
    }

    public function show($nim)
    {
        $berkasmahasiswa =
            BerkasMahasiswa::join('mahasiswa', 'berkasmahasiswa.nim', '=', 'mahasiswa.nim')
            ->where('berkasmahasiswa.nim', $nim)
            ->select('berkasmahasiswa.*', 'mahasiswa.*')
            ->first();

        // $file = storage_path('app/public/uploads/') . $nim . '_dokumenkhs.pdf';
        // $dokumenkhs = ['Content-Type' => 'dokumenkhs/pdf'];
        // return response()->stream($file, 'Test File', $dokumenkhs);

        //$path = storage_path('app/public/uploads/$nim . _dokumenkhs.pdf');
        // $path = storage_path('public/storage/uploads/1815323055_dokumenkhs.pdf');
        // $filePath = storage_path('public/storage/uploads/1815323055_dokumenkhs.pdf');

        // if (!Storage::exists($filePath)) {
        //     abort(404);
        // }

        // $headers = [
        //     'Content-Type' => 'application/pdf',
        // ];

        // return response()->file($filePath, $headers);


        return view('berkasmahasiswa/show', data: compact('berkasmahasiswa'));
    }

    public function edit($nim)
    {
        $berkasmahasiswa =
            BerkasMahasiswa::join('mahasiswa', 'berkasmahasiswa.nim', '=', 'mahasiswa.nim')
            ->where('berkasmahasiswa.nim', $nim)
            ->select('berkasmahasiswa.*', 'mahasiswa.*')
            ->first();;

        return view('berkasmahasiswa/update', data: compact('berkasmahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'status' => 'required',
            'keterangan' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $berkasmahasiswa = BerkasMahasiswa::where('nim', $nim)->first();
        $berkasmahasiswa->update($validatedData);

        return redirect('/berkasmahasiswa')->with('success', 'Data Berkas Mahasiswa Berhasil diedit !');
    }


    public function detail()
    {
        $berkasmahasiswa = BerkasMahasiswa::latest()->paginate(5);

        //tampilkan halaman index
        return view('berkasmahasiswa/detail', data: compact('berkasmahasiswa'));
    }
}
