<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'matakuliah';
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
    public function rumpun()
    {
        return $this->belongsTo(Rumpun::class, 'rumpun_id');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    public function program_studi()
    {
        return $this->belongsTo(Program_studi::class, 'program_studi_id');
    }
    public function kurikulum()
    {
        return $this->belongsToMany(Kurikulum::class, 'matakuliah_kurikulum', 'matakuliah_id', 'kurikulum_id');
    }

    public function matakuliah_kurikulum()
    {
        return $this->hasMany(Matakuliah_kurikulum::class, 'matakuliah_id');
    }

    public function pegawai_rps()
    {
        return $this->belongsToMany(Pegawai::class, 'matakuliah_pegawai', 'matakuliah_id', 'pegawai_id');
    }
    
    public function capaian_lulusan()
    {
        return $this->belongsToMany(Capaian_lulusan::class, 'cpl', 'matakuliah_id', 'capaian_lulusan_id');
    }

    public function pegawai_pengampu()
    {
        return $this->belongsToMany(Pegawai::class, 'pengampu', 'matakuliah_id', 'pegawai_id');
    }

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'matakuliah_id');
    }

    public function cpl()
    {
        return $this->hasMany(Cpl::class, 'matakuliah_id');
    }

    public function cpmk()
    {
        return $this->hasMany(Cpmk::class, 'matakuliah_id')->orderBy('urutan', 'asc');
    }
    public function rencana_pembelajaran()
    {
        return $this->hasMany(Rencana_pembelajaran::class, 'matakuliah_id')->orderBy('urutan', 'asc');
    }

    public function karakteristik()
    {
        return $this->belongsToMany(Karakteristik::class, 'rps_karakteristik', 'matakuliah_id', 'karakteristik_id');
    }
    
    public function rps_karakteristik()
    {
        return $this->hasMany(Rps_karakteristik::class, 'matakuliah_id');
    }

    public function bentuk()
    {
        return $this->belongsToMany(Bentuk::class, 'rps_bentuk', 'matakuliah_id', 'bentuk_id');
    }
    public function rps_bentuk()
    {
        return $this->hasMany(Rps_bentuk::class, 'matakuliah_id');
    }
    
    public function metode_pembelajaran()
    {
        return $this->belongsToMany(Metode_pembelajaran::class, 'rps_metode', 'matakuliah_id', 'metode_pembelajaran_id');
    }
    public function rps_metode()
    {
        return $this->hasMany(Rps_metode::class, 'matakuliah_id');
    }

}
