<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $primaryKey = "nim";
    protected $fillable = ['nim', 'nama', 'jk', 'idprodi','email',
    'notelp','alamat', 'namaayah', 'pekerjaanayah', 'penghasilanayah',
    'namaibu', 'pekerjaanibu', 'penghasilanibu','tanggungan',
    'totalpenghasilan', 'namabank', 'norek', 'semester', 'idtahunusulan'];

    public function tahunusulan(){
        return $this->belongsTo(tahunusulan::class);
    }

    public function prodi(){
        return $this->belongsTo(prodi::class);
    }

    public function ipk(){
        return $this->hasMany(ipk::class);
    }

    public function nilaiprestasi(){
        return $this->hasMany(nilaiprestasi::class);
    }
}
