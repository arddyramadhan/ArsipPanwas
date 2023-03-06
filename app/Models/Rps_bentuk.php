<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rps_bentuk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'rps_bentuk';

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    public function bentuk()
    {
        return $this->belongsTo(Bentuk::class, 'bentuk_id');
    }
}
