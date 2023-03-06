<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana_pembelajaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table ='rencana_pembelajaran';

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
    
    public function karakteristik_pembelajaran()
    {
        return $this->belongsToMany(Karakteristik::class, 'rps_karakteristik', 'rencana_pembelajaran_id', 'karakteristik_id');
    }
    public function rps_karakteristik_pembelajaran()
    {
        return $this->hasMany(Rps_karakteristik::class, 'rencana_pembelajaran_id');
    }

    public function karakteristik_pembelajaran_daring()
    {
        return $this->belongsToMany(Karakteristik::class, 'rps_karakteristik_daring', 'rencana_pembelajaran_id', 'karakteristik_id');
    }
    public function rps_karakteristik_pembelajaran_daring()
    {
        return $this->hasMany(Rps_karakteristik_daring::class, 'rencana_pembelajaran_id');
    }

    public function bentuk_pembelajaran()
    {
        return $this->belongsToMany(Bentuk::class, 'rps_bentuk', 'rencana_pembelajaran_id', 'bentuk_id');
    }
    public function rps_bentuk_pembelajaran()
    {
        return $this->hasMany(Rps_bentuk::class, 'rencana_pembelajaran_id');
    }

    public function bentuk_pembelajaran_daring()
    {
        return $this->belongsToMany(Bentuk::class, 'rps_bentuk_daring', 'rencana_pembelajaran_id', 'bentuk_id');
    }
    public function rps_bentuk_pembelajaran_daring()
    {
        return $this->hasMany(Rps_bentuk_daring::class, 'rencana_pembelajaran_id');
    }

    public function rps_metode()
    {
        return $this->hasMany(Rps_metode::class, 'rencana_pembelajaran_id');
    }

    public function metode_pembelajaran()
    {
        return $this->belongsToMany(Metode_pembelajaran::class, 'rps_metode', 'rencana_pembelajaran_id', 'metode_pembelajaran_id');
    }

    public function rps_metode_daring()
    {
        return $this->hasMany(Rps_metode_daring::class, 'rencana_pembelajaran_id');
    }

    public function metode_pembelajaran_daring()
    {
        return $this->belongsToMany(Metode_pembelajaran::class, 'rps_metode_daring', 'rencana_pembelajaran_id', 'metode_pembelajaran_id');
    }
    
}
