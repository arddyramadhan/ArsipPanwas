<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai_prodi extends Model
{
    use HasFactory;
    protected $table = 'pegawai_prodi';
    protected $guarded = ['id'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function program_studi()
    {
        return $this->belongsTo(Program_studi::class, 'program_studi_id');
    }
}
