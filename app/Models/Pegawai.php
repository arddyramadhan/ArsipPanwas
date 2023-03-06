<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Middleware\ThrottlesExceptions;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'pegawai_id');
    }
    public function matakuliah_rps()
    {
        return $this->belongsToMany(Matakuliah::class, 'matakuliah_pegawai', 'pegawai_id', 'matakuliah_id');
    }
    public function pegawai_pengampu()
    {
        return $this->belongsToMany(Matakuliah::class, 'pengampu', 'pegawai_id', 'matakuliah_id');
    }
    
    public function pegawai_fakultas()
    {
        return $this->hasOne(Pegawai_fakultas::class, 'pegawai_id');
    }
    
}
