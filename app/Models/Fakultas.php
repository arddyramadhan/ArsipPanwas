<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table='fakultas';
    
    public function program_studi()
    {
        return $this->hasMany(Program_studi::class, 'fakultas_id');
    }

    public function pegawai_fakultas_aktiv()
    {
        return $this->hasOne(Pegawai_fakultas::class, 'fakultas_id')->where('status', 'aktiv');
    }

    public function pegawai_fakultas()
    {
        return $this->hasMany(Pegawai_fakultas::class, 'fakultas_id');
    }
}
