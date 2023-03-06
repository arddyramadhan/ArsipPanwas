<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_studi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'program_studi';

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'program_studi_id');
    }

    public function pegawai_prodi()
    {
        return $this->hasMany(Pegawai_prodi::class, 'program_studi_id');
    }

    public function ketua_prodi()
    {
        return $this->hasOne(Pegawai_prodi::class, 'program_studi_id')->where('jabatan', 'kaprodi');
    }
}
