<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCompetition extends Model
{
    use HasFactory;
    protected $table = 'test_comp';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cv_id',
        'CountDete',
        'CountInfl',
        'CountEsta',
        'CountCump',
        'test_finished',
        'finished_date'
    ];
}
