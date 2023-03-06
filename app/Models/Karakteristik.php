<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karakteristik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'karakteristik';
    
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'rps_karakteristik','karakteristik_id', 'matakuliah_id');
    }
}
