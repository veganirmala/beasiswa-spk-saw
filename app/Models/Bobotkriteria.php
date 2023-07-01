<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobotkriteria extends Model
{
    use HasFactory;

    protected $table = "bobotkriteria";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'idtahunusulan', 'idjenisbeasiswa', 
    'bobotkriteriaipk', 'bobotkriteriaprestasi', 'bobotkriteriapenghasilan'];

    public function tahunusulan(){
        return $this->belongsTo(Tahunusulan::class);
    }

    public function jenisbeasiswa(){
        return $this->belongsTo(Jenisbeasiswa::class);
    }
}
