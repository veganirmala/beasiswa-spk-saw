<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilaiprestasi extends Model
{
    use HasFactory;

    protected $table = "nilaiprestasi";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'nim', 'id_jenis_prestasi', 
    'skor', 'total', 'id_usulan', 'id_jenis_beasiswa'];

    public function mahasiswa(){
        return $this->belongsTo(mahasiswa::class);
    }

    public function jenisprestasi(){
        return $this->belongsTo(jenisprestasi::class);
    }

    public function tahunusulan(){
        return $this->belongsTo(tahunusulan::class);
    }

    public function jenisbeasiswa(){
        return $this->belongsTo(jenisbeasiswa::class);
    }
}
