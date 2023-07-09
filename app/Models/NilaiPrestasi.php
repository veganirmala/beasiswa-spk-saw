<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPrestasi extends Model
{
    use HasFactory;

    protected $table = "nilaiprestasi";
    protected $primaryKey = "nim";
    protected $fillable = [
        'id', 'nim', 'id_jenis_prestasi',
        'skor', 'total', 'id_usulan', 'id_jenis_beasiswa'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function jenisprestasi()
    {
        return $this->belongsTo(Jenisprestasi::class);
    }

    public function tahunusulan()
    {
        return $this->belongsTo(TahunUsulan::class);
    }

    public function jenisbeasiswa()
    {
        return $this->belongsTo(JenisBeasiswa::class);
    }
}
