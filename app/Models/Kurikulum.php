<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;
    protected $table = 'kurikulum';
    protected $guarded = ['id'];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'matakuliah_kurikulum', 'kurikulum_id', 'matakuliah_id');
    }
}
