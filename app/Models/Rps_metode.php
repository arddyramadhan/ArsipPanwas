<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rps_metode extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'rps_metode';

    public function matode_pembelajaran()
    {
        return $this->belongsTo(Metode_pembelajaran::class, 'matode_pembelajaran_id');
    }
}
