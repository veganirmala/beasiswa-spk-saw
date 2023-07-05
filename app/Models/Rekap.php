<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;

    public function tahunusulan()
    {
        return $this->belongsTo(TahunUsulan::class);
    }
}
