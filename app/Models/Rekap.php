<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $table = "rekap";
    protected $primaryKey = "id";
    protected $fillable = ['nim', 'tahun', 'skor_ipk', 'skor_prestasi', 'skor_ekonomi', 'total', 'status'];


    public function tahunusulan()
    {
        return $this->belongsTo(TahunUsulan::class);
    }
}
