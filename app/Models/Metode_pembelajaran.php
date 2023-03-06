<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode_pembelajaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'metode_pembelajaran';
    
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    
}
