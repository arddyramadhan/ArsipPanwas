<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumpun extends Model
{
    use HasFactory;
    protected $table = 'rumpun';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    
    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'rumpun_id');
    }
}
