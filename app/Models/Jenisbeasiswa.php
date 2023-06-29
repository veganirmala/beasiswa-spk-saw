<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisbeasiswa extends Model
{
    use HasFactory;

    protected $table = "jenisbeasiswas";
    protected $guarded = ['id'];

    public function tahunusulan(){
        return $this->hasMany(tahunusulan::class);
    }
}
