<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisprestasi extends Model
{
    use HasFactory;

    protected $table = "jenisprestasi";
    protected $guarded = ['id'];

    public function nilaiprestasi(){
        return $this->hasMany(nilaiprestasi::class);
    }
}
