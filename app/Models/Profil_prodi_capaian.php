<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_prodi_capaian extends Model
{
    use HasFactory;
    protected $table = 'profil_prodi_capaian';
    protected $guarded = ['id'];
    public function profil_prodi()
    {
        return $this->belongsTo(Profil_prodi::class, 'profil_prodi_id');
    }
    public function capaian_luluan()
    {
        return $this->belongsTo(Capaian_lulusan::class, 'capaian_luluan_id');
    }
}
