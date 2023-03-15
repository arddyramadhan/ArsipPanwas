<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'berkas';

    public function jenis()
    {
        return $this->belongsTo(Jenis::class,'jenis_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Jenis::class,'pegawai_id');
    }
}
