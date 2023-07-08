<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\TahunUsulan;
use Illuminate\Support\Facades\DB;
use stdClass;

class RekapanBeasiswaController extends Controller
{

    private $mahasiswa = [];
    private $nilai = [];
    private $penilaian = [];
    private $normalisasi = [];
    private $total = 0;


    public function index()
    {
        //tampilkan halaman index
        $thusulan = TahunUsulan::all();
        $rekapan = Rekap::all();
        return view('rekapanbeasiswa/index', compact('thusulan', 'rekapan'));
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

    public function getValueInArray($type, $array, $index)
    {

        $resultValue = null;

        foreach ($array as $subarray) {
            $value = $subarray[$index];

            if ($type === 'max') {
                if ($resultValue === null || $value > $resultValue) {
                    $resultValue = $value;
                }
            } else {
                if ($resultValue === null || $value < $resultValue) {
                    $resultValue = $value;
                }
            }
        }

        return $resultValue;
    }

    //sinkronisasi data rekapan
    public function rekap_sinkron()
    {
        //ngambil data mahasiswa dengan inner join ke tabel ipk dan nilai prestasi
        $datamahasiswa = DB::table('mahasiswa')
            ->join('ipk', 'mahasiswa.nim', '=', 'ipk.nim')
            ->join('nilaiprestasi', 'mahasiswa.nim', '=', 'nilaiprestasi.nim')
            ->join('tahunusulan', 'mahasiswa.idtahunusulan', '=', 'tahunusulan.id')
            ->where('status', '=', 'Aktif')
            ->select('*')
            ->get();

        //ngambil data tahun usulan aktif
        // $tahunusulan = DB::table('tahunusulan')
        //     ->where('status', '=', 'Aktif')
        //     ->select('*')
        //     ->get();


        //panggil function datamahasiswa
        $this->run($datamahasiswa);

        //panggil function rekap dari controller rekap
        return redirect('rekapanbeasiswa');
    }

    public function run($datamahasiswa)
    {

        $generated_score = [];

        foreach ($datamahasiswa as $datamhs) {
            //ngambil data mahasiswa
            $this->mahasiswa = [
                $datamhs->nim,
                $datamhs->nilai_ipk,
                $datamhs->total,
                $datamhs->totalpenghasilan,
            ];

            //simpan data nim mahasiswa di kolom 1
            $nim =  $this->mahasiswa[0];

            //simpan data skor ipk di kolom 1
            $skor_ipk = $this->getIPK($this->mahasiswa[1]);

            //simpan data skor prestasi di kolom 3
            $skor_prestasi = $this->getPrestasi($this->mahasiswa[2]);

            //simpan data skor ekonomi di kolom 4
            $skor_ekonomi = $this->getEkonomi($this->mahasiswa[3]);

            $temp_data_mhs = new stdClass();
            $temp_data_mhs->nim = $nim;
            $temp_data_mhs->skor_ipk = $skor_ipk;
            $temp_data_mhs->skor_prestasi = $skor_prestasi;
            $temp_data_mhs->skor_ekonomi = $skor_ekonomi;
            $generated_score[] = $temp_data_mhs;

            //simpan semua data mahasiswa bentuk array
            for ($i = 0; $i < count($generated_score); $i++) {
                $this->nilai[$i] = [];
                for ($j = 0; $j < 3; $j++) {
                    $this->nilai[$i][0] = $generated_score[$i]->nim;
                    $this->nilai[$i][1] = $generated_score[$i]->skor_ipk; //benefit
                    $this->nilai[$i][2] = $generated_score[$i]->skor_prestasi; //benefit
                    $this->nilai[$i][3] = $generated_score[$i]->skor_ekonomi; //cost
                }
            }

            //hitung max kriteria ipk dari tabel dummy
            $max_ipk = $this->getValueInArray('max', $this->nilai, 1);

            //hitung max kriteria prestasi dari tabel dummy
            $max_prestasi = $this->getValueInArray('max', $this->nilai, 2);

            //hitung min kriteria ekonomi dari tabel dummy
            $min_ekonomi = $this->getValueInArray('min', $this->nilai, 3);

            //RUMUS BENEFIT DAN COST SAW
            if ($skor_ipk >= 0.2) {
                $this->penilaian[1] = $skor_ipk / $max_ipk;
            }
            if ($skor_prestasi >= 0.2) {
                $this->penilaian[2] = $skor_prestasi / $max_prestasi;
            }
            if ($skor_ekonomi >= 0.2) {
                $this->penilaian[3] = $min_ekonomi / $skor_ekonomi;
            }

            //Nilai Bobot Persentase Per Kriteria ngambil dari tabel bobot
            $get_table_bobot = DB::table('bobotkriteria')
                ->select('tahun', 'bobotkriteriaipk', 'bobotkriteriaprestasi', 'bobotkriteriapenghasilan', 'kuota', 'status')
                ->join('tahunusulan', 'bobotkriteria.idtahunusulan', '=', 'tahunusulan.id')
                ->where('status', '=', 'Aktif')
                ->get();

            $w = $get_table_bobot->toArray()[0];

            //Rumus Normalisasi dikalikan dengan bobot
            $this->normalisasi[0] = $w->bobotkriteriaipk * $this->penilaian[1];
            $this->normalisasi[1] = $w->bobotkriteriaprestasi * $this->penilaian[2];
            $this->normalisasi[2] = $w->bobotkriteriapenghasilan * $this->penilaian[3];

            //hitung total nilai mahasiswa
            $this->total = $this->normalisasi[0] + $this->normalisasi[1] + $this->normalisasi[2];

            //buat if status nilai akhir
            if ($this->total >= 85) {
                $status = 'Sangat Layak';
            } else if ($this->total >= 75) {
                $status = 'Layak';
            } else {
                $status = 'Tidak Layak';
            }

            $payloadRekap = [
                'nim' => $datamhs->nim,
                'tahun' => $datamhs->tahun,
                'skor_ipk' => $skor_ipk,
                'skor_prestasi' => $skor_prestasi,
                'skor_ekonomi' => $skor_ekonomi,
                'total' => $this->total,
                'status' => $status
            ];

            //simpan ke tabel rekap
            Rekap::create($payloadRekap);
        }
    }
}
