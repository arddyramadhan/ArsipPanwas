<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Middleware\ThrottlesExceptions;

class Jurusan extends Model
{
    use HasFactory;
    protected $table= 'jurusan';
    protected $guarded = ['id'];
    
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'jurusan_id');
    }

    public function pegawai_jurusan()
    {
        return $this->hasMany(Pegawai_jurusan::class, 'jurusan_id');
    }

    public function karakteristik()
    {
        return $this->hasMany(Karakteristik::class , 'jurusan_id');
    }
    
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class , 'jurusan_id');
    }
    public function program_studi()
    {
        return $this->hasMany(Program_studi::class, 'jurusan_id');
    }
    public function rumpun()
    {
        return $this->hasMany(Rumpun::class,'jurusan_id');
    }

    public function capaian_lulusan()
    {
        return $this->hasMany(Capaian_lulusan::class,'jurusan_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
