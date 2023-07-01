<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBeasiswa extends Model
{
    use HasFactory;

    protected $table = "jenisbeasiswa";
    protected $guarded = ['id'];

    public function tahunusulan()
    {
        return $this->hasMany(TahunUsulan::class);
    }

    public function bobotkriteria()
    {
        return $this->hasMany(Bobotkriteria::class);
    }

    public function jenisbeasiswa()
    {
        return $this->hasMany(JenisBeasiswa::class);
    }
}
