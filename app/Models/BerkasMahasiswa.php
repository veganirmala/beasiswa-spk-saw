<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasMahasiswa extends Model
{
    use HasFactory;

    protected $table = "berkasmahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nim', 'dokumenkhs',
        'dokumenpenghasilan', 'dokumennilaiprestasi', 'status', 'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
