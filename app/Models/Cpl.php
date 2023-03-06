<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    use HasFactory;
    protected $table = 'cpl';
    protected $guarded = ['id'];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    public function capaian_lulusan()
    {
        return $this->belongsTo(Matakuliah::class, 'capaian_lulusan_id');
    }
}
