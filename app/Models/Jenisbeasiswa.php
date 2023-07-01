<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisbeasiswa extends Model
{
    use HasFactory;

    protected $table = "jenisbeasiswa";
    protected $guarded = ['id'];

    public function tahunusulan(){
        return $this->hasMany(tahunusulan::class);
    }

    public function bobotkriteria(){
        return $this->hasMany(Bobotkriteria::class);
    }

    public function jenisbeasiswa(){
        return $this->hasMany(jenisbeasiswa::class);
    }
}
