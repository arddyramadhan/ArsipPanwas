<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rps_karakteristik_daring extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'rps_karakteristik_daring';
    
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    public function karakteristik()
    {
        return $this->belongsTo(Karakteristik::class, 'karakteristik_id');
    }
}
