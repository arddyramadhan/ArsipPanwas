<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capaian_lulusan extends Model
{
    use HasFactory;
    protected $table = 'capaian_lulusan';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function profil_lulusan()
    {
        return $this->belongsTo(Profil_lulusan::class, 'profil_lulusan_id');
    }

    public function matakuliah()
    {
        return $this->belongsToMany(Kurikulum::class, 'cpl', 'capaian_lulusan_id', 'matakuliah_id');
    }

    public function cpl()
    {
        return $this->hasMany(Cpl::class, 'capaian_lulusan_id');
    }

    public function profil_jurusan()
    {
        return $this->belongsToMany(Profil_jurusan::class, 'profil_jurusan_capaian', 'capaian_luluan_id', 'profil_jurusan_id');
    }
    public function profil_jurusan_capaian()
    {
        return $this->hasMany(Profil_jurusan_capaian::class, 'capaian_lulusan_id');
    }

    public function profil_prodi()
    {
        return $this->belongsToMany(Profil_prodi::class, 'profil_prodi_capaian', 'capaian_luluan_id', 'profil_prodi_id');
    }
    public function profil_prodi_capaian()
    {
        return $this->hasMany(Profil_prodi_capaian::class, 'capaian_lulusan_id');
    }
}
