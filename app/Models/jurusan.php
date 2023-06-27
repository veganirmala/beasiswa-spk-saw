<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = "jurusan";
    protected $guarded = ['id'];
    // protected $primaryKey = "id";
    // protected $fillable = ['id', 'namajurusan'];

    public function prodi(){
        return $this->hasMany(Prodi::class);
    }
}
