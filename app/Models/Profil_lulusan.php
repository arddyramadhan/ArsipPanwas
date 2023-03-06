<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil_lulusan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'profil_lulusan';
    
    public function capaian_lulusan()
    {
        return $this->hasMany(Capaian_lulusan::class, 'profil_lulusan_id')->orderBy('urutan','asc');
    }

    public function capaian_lulusan2()
    {
        return $this->hasMany(Capaian_lulusan::class, 'profil_lulusan_id');
    }
}
