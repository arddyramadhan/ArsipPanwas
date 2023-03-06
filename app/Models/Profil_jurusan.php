<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_jurusan extends Model
{
    use HasFactory;
    protected $table = 'profil_jurusan';
    protected $guarded = ['id'];
    
    public function capaian_lulusan()
    {
        return $this->belongsToMany(Capaian_lulusan::class, 'profil_jurusan_capaian', 'profil_jurusan_id', 'capaian_lulusan_id');
    }
    public function profil_jurusan_capaian()
    {
        return $this->hasMany(Profil_jurusan_capaian::class, 'profil_jurusan_id');
    }
}
