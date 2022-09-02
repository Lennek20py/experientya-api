<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuiesSpecific extends Model
{
    use HasFactory;

    protected $table = 'anuies_specific';

    public function general()
    {
        return $this->belongsTo('App\Models\AnuiesGeneral');
    }
}
