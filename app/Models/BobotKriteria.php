<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    use HasFactory;

    protected $table = "bobotkriteria";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'idtahunusulan', 'idjenisbeasiswa',
        'bobotkriteriaipk', 'bobotkriteriaprestasi', 'bobotkriteriapenghasilan'
    ];

    public function tahunusulan()
    {
        return $this->belongsTo(TahunUsulan::class);
    }

    public function jenisbeasiswa()
    {
        return $this->belongsTo(JenisBeasiswa::class);
    }
}
