<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_jurusan_capaian extends Model
{
    use HasFactory;
    protected $table = 'profil_jurusan_capaian';
    protected $guarded = ['id'];

    public function profil_jurusan()
    {
        return $this->belongsTo(Profil_jurusan::class, 'profil_jurusan_id');
    }

    public function capaian_luluan()
    {
        return $this->belongsTo(Capaian_lulusan::class, 'capaian_luluan_id');
    }
}
