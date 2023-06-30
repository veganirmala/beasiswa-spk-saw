<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahunusulan extends Model
{
    use HasFactory;

    protected $table = "tahunusulans";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'idjenisbeasiswa', 'tahun', 'kuota'];

    public function jenisbeasiswa(){
        return $this->belongsTo(Jenisbeasiswa::class);
    }

    public function bobotkriteria(){
        return $this->hasMany(Bobotkriteria::class);
    }

    public function tahunusulan(){
        return $this->hasMany(tahunusulan::class);
    }
}
