<?php

namespace App\Http\Controllers;

use App\Models\BerkasMahasiswa;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Auth;
use Session;

class BerkasMahasiswaController extends Controller
{
    public function index()
    {
        if (Session::get('user_level') == 'Admin') {
            //if ($request->has('search')) {
            // $berkasmahasiswa = BerkasMahasiswa::where('nim', 'LIKE', '%' . $request->search . '%')
            //     ->orwhere('status', 'LIKE', '%' . $request->search . '%')
            //     ->latest()->paginate(5);
            //} else {
            //mengambil semua data diurutkan dari yg terbaru DESC
            $berkasmahasiswa = BerkasMahasiswa::latest()->paginate(5);
            //}
        } else {
            $nim = Session::get('user_nim');
            $berkasmahasiswa = BerkasMahasiswa::where('berkasmahasiswa.nim', $nim)->latest()->paginate(5);
        }

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
        $request->validate([
            'nim' => 'required',
            'dokumenkhs' => 'required|file|mimes:pdf',
            'dokumenpenghasilan' => 'required|file|mimes:pdf',
            'dokumennilaiprestasi' => 'required|file|mimes:pdf',
        ]);

        // Process other form data if needed
        $nim = $request->input('nim');

        // Store the files
        if ($request->hasFile('dokumenkhs')) {
            $dokumenkhsName = $nim . '_dokumenkhs.pdf';
            $request->file('dokumenkhs')->storeAs('uploads', $dokumenkhsName, 'public');
        }

        if ($request->hasFile('dokumenpenghasilan')) {
            $dokumenpenghasilanName = $nim . '_dokumenpenghasilan.pdf';
            $request->file('dokumenpenghasilan')->storeAs('uploads', $dokumenpenghasilanName, 'public');
        }

        if ($request->hasFile('dokumennilaiprestasi')) {
            $dokumennilaiprestasiName = $nim . '_dokumennilaiprestasi.pdf';
            $request->file('dokumennilaiprestasi')->storeAs('uploads', $dokumennilaiprestasiName, 'public');
        }

        // Store the data in the database
        BerkasMahasiswa::create([
            'nim' => $nim,
            'dokumenkhs' => $dokumenkhsName,
            'dokumenpenghasilan' => $dokumenpenghasilanName,
            'dokumennilaiprestasi' => $dokumennilaiprestasiName,
        ]);

        return redirect('/berkasmahasiswa')->with('success', 'Data Berkas Mahasiswa Berhasil ditambahkan !');
    }

    public function show($nim)
    {
        $berkasmahasiswa =
            BerkasMahasiswa::join('mahasiswa', 'berkasmahasiswa.nim', '=', 'mahasiswa.nim')
            ->where('berkasmahasiswa.nim', $nim)
            ->select('berkasmahasiswa.*', 'mahasiswa.*')
            ->first();

        $file_path = new stdClass();

        $file_path->dokumenkhs = '/storage/uploads/' . $berkasmahasiswa->dokumenkhs;
        $file_path->dokumenpenghasilan = '/storage/uploads/' . $berkasmahasiswa->dokumenpenghasilan;
        $file_path->dokumennilaiprestasi = '/storage/uploads/' . $berkasmahasiswa->dokumennilaiprestasi;

        return view('berkasmahasiswa/show', data: compact('berkasmahasiswa', 'file_path'));
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
            'nim' => 'required',
            'dokumenkhs' => 'required|file|mimes:pdf',
            'dokumenpenghasilan' => 'required|file|mimes:pdf',
            'dokumennilaiprestasi' => 'required|file|mimes:pdf',
        ]);

        // Process other form data if needed
        $nim = $request->input('nim');

        // Store the files
        if ($request->hasFile('dokumenkhs')) {
            $dokumenkhsName = $nim . '_dokumenkhs.pdf';
            $request->file('dokumenkhs')->storeAs('uploads', $dokumenkhsName, 'public');
        }

        if ($request->hasFile('dokumenpenghasilan')) {
            $dokumenpenghasilanName = $nim . '_dokumenpenghasilan.pdf';
            $request->file('dokumenpenghasilan')->storeAs('uploads', $dokumenpenghasilanName, 'public');
        }

        if ($request->hasFile('dokumennilaiprestasi')) {
            $dokumennilaiprestasiName = $nim . '_dokumennilaiprestasi.pdf';
            $request->file('dokumennilaiprestasi')->storeAs('uploads', $dokumennilaiprestasiName, 'public');
        }

        //mengambil data yg akan diupdate
        $berkasmahasiswa = BerkasMahasiswa::where('nim', $nim)->first();
        $berkasmahasiswa->update($validatedData);

        return redirect('/berkasmahasiswa')->with('success', 'Data Berkas Mahasiswa Berhasil diedit !');
    }

    public function editBerkas($nim)
    {
        $berkasmahasiswa =
            BerkasMahasiswa::join('mahasiswa', 'berkasmahasiswa.nim', '=', 'mahasiswa.nim')
            ->where('berkasmahasiswa.nim', $nim)
            ->select('berkasmahasiswa.*', 'mahasiswa.*')
            ->first();;

        return view('berkasmahasiswa/editdokumen', data: compact('berkasmahasiswa'));
    }

    public function updateBerkas(Request $request, $nim)
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
        if (Session::get('user_level') == 'Admin') {
            //mengambil semua data diurutkan dari yg terbaru DESC
            $berkasmahasiswa = BerkasMahasiswa::latest()->paginate(5);
        } else {
            $nim = Session::get('user_nim');
            $berkasmahasiswa = BerkasMahasiswa::where('berkasmahasiswa.nim', $nim)->latest()->paginate(5);
        }

        //tampilkan halaman index
        return view('berkasmahasiswa/detail', data: compact('berkasmahasiswa'));
    }
}
