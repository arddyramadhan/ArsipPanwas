<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_prodi extends Model
{
    use HasFactory;
    protected $table = 'profil_prodi';
    protected $guarded = ['id'];

    public function capaian_lulusan()
    {
        return $this->belongsToMany(Capaian_lulusan::class, 'profil_prodi_capaian', 'profil_prodi_id', 'capaian_lulusan_id');
    }
    public function profil_prodi_capaian()
    {
        return $this->hasMany(Profil_prodi_capaian::class, 'profil_prodi_id');
    }

    public function program_studi()
    {
        return $this->belongsTo(Program_studi::class, 'program_studi_id');
    }
}
