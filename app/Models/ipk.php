<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ipk extends Model
{
    use HasFactory;

    protected $table = "ipk";
    protected $primaryKey = "id";
    protected $fillable = ['nim', 'nilai_ipk'];

    public function mahasiswa(){
        return $this->belongsTo(mahasiswa::class);
    }
}
