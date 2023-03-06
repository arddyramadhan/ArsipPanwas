<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kabupaten_officer()
    {
        return $this->hasOne(Kabupaten_officer::class, 'personnel_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
