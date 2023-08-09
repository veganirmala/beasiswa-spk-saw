<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $primaryKey = "nim";
    protected $fillable = [
        'nim', 'nama', 'jk', 'idprodi', 'email',
        'notelp', 'alamat', 'namaayah', 'pekerjaanayah', 'penghasilanayah',
        'namaibu', 'pekerjaanibu', 'penghasilanibu', 'tanggungan',
        'totalpenghasilan', 'namabank', 'norek', 'semester', 'idtahunusulan'
    ];

    public function tahunusulan()
    {
        return $this->belongsTo(TahunUsulan::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function ipk()
    {
        return $this->hasMany(Ipk::class);
    }

    public function nilaiprestasi()
    {
        return $this->hasMany(NilaiPrestasi::class);
    }

    public function berkasmahasiswa()
    {
        return $this->hasMany(BerkasMahasiswa::class);
    }
}
