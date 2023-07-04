<?php

namespace App\Http\Controllers;

use App\Models\TahunUsulan;
use Illuminate\Http\Request;

class RekapanbeasiswaController extends Controller
{
    public function index()
    {
         //tampilkan halaman index
        $thusulan = TahunUsulan::all();
        return view('rekapanbeasiswa/index', compact('thusulan'));
    }

    //function cek skor IPK
    public function getIPK($ipk)
    {
        if ($ipk >= 3.61) {
            return 1;
        } else if ($ipk >= 3.41) {
            return 0.8;
        } else if ($ipk >= 3.21) {
            return 0.6;
        } else if ($ipk >= 3.01) {
            return 0.4;
        } else {
            return 0.2;
        }
    }

    //function cek skor Prestasi
    public function getPrestasi($prestasi)
    {
        if ($prestasi >= 21) {
            return 1;
        } else if ($prestasi >= 16) {
            return 0.8;
        } else if ($prestasi >= 11) {
            return 0.6;
        } else if ($prestasi >= 6) {
            return 0.4;
        } else {
            return 0.2;
        }
    }

    //function cek skor Ekonomi
    public function getEkonomi($ekonomi)
    {
        if ($ekonomi >= 3000001) {
            return 0.2;
        } else if ($ekonomi >= 2000001) {
            return 0.4;
        } else if ($ekonomi >= 1000001) {
            return 0.6;
        } else if ($ekonomi >= 500001) {
            return 0.8;
        } else {
            return 1;
        }
    }

    //sinkronisasi data rekapan
    public function rekap_sinkron()
    {
            //ngambil data mahasiswa dengan inner join ke tabel ipk dan nilai prestasi
            $mahasiswa = DB::table('mahasiswa')
            ->join('ipk', 'mahasiswa.nim', '=', 'ipk.nim')
            ->join('nilaiprestasi', 'mahasiswa.nim', '=', 'nilaiprestasi.nim')
            ->select('*')
            ->get();

            //ngambil data tahun usulan aktif
            $tahunusulan = DB::table('tahunusulan')
            ->where('status_usulan','=', 'Aktif')
            ->select('*')
            ->get();

            //panggil function datamahasiswa
            $this->run($datamahasiswa);

            //panggil function rekap dari controller rekap
            redirect('rekap/index');
    }

    public function run($datamahasiswa)
    {
        foreach ($datamahasiswa as $datamhs) {
            //ngambil data mahasiswa
            $this->mahasiswa = [
                $datamhs['nim'],
                $datamhs['ipk'],
                $datamhs['nilai_prestasi'],
                $datamhs['ortu_penghasilan'],
            ];

            //simpan data skor ipk di kolom 1
            $skor_ipk = $this->getIPK($this->mahasiswa[1]);

            //simpan data skor prestasi di kolom 3
            $skor_prestasi = $this->getPrestasi($this->mahasiswa[2]);

            //simpan data skor ekonomi di kolom 4
            $skor_ekonomi = $this->getEkonomi($this->mahasiswa[3]);

            //simpan data nim mahasiswa di kolom 1
            $nim =  $this->mahasiswa[0];

            //buat tabel dummy

            //simpan ulang data mahasiswa ke dalam tabel dummy

            //select dulu data dari tabel dummy dan tabel mahasiswa


            //simpan semua data mahasiswa bentuk array
            for ($i = 0; $i < count($alternatif); $i++) {
                $this->nilai[$i] = [];
                for ($j = 0; $j < 4; $j++) {
                    $this->nilai[$i][0] = $nim;
                    $this->nilai[$i][1] = $skor_ipk; //benefit
                    $this->nilai[$i][2] = $skor_prestasi; //benefit
                    $this->nilai[$i][3] = $skor_ekonomi; //cost
                }
            }

            //hitung max kriteria ipk

            //hitung max kriteria prestasi

            //hitung min kriteria ekonomi

            //RUMUS BENEFIT DAN COST SAW
            if ($skor_ipk >= 0.2) {
                $this->penilaian[1] = $skor_ipk / $kriteriaipk['kriteria_ip'];
            }
            if ($skor_prestasi >= 0.2) {
                $this->penilaian[2] = $skor_prestasi / $kriteria_prestasi['kriteria_prestasi'];
            }
            if ($skor_ekonomi >= 0.2) {
                $this->penilaian[3] = $kriteria_ekonomi['kriteria_ekonomi'] / $skor_ekonomi;
            }

            //Nilai Bobot Persentase Per Kriteria ngambil dari tabel bobot
            $w = [];

            //Rumus Normalisasi dikalikan dengan bobot
            $this->normalisasi[0] = $w[0] * $this->penilaian[1];
            $this->normalisasi[1] = $w[1] * $this->penilaian[2];
            $this->normalisasi[2] = $w[2] * $this->penilaian[3];
            $this->normalisasi[3] = $w[3] * $this->penilaian[4];

            //hitung total nilai mahasiswa
            $this->total = $this->normalisasi[0] + $this->normalisasi[1] + $this->normalisasi[2] + $this->normalisasi[3];

            //buat if status nilai akhir
            if ($this->total >= 85) {
                $status = 'Sangat Layak';
            } else if ($this->total >= 75) {
                $status = 'Layak';
            } else {
                $status = 'Tidak Layak';
            }

            //simpan ke tabel rekap
        }
    }
}
