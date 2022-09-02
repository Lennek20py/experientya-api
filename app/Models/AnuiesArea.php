<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuiesArea extends Model
{
    use HasFactory;

    protected $table = 'anuies_area';


    public function generals()
    {
        return $this->hasMany('App\Models\AnuiesGeneral');
    }
}
