<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuiesGeneral extends Model
{
    use HasFactory;

    protected $table = 'anuies_general';

    public function area()
    {
        return $this->belongsTo('App\Models\AnuiesArea');
    }

    public function specifics()
    {
        return $this->hasMany('App\Models\AnuiesSpecific');
    }

}
