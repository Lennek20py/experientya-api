<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSoftSkill extends Model
{
    use HasFactory;
    protected $table = 'test_soft_skills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cv_id',
        'name_user',
        'finished_test',
        'finished_date'
    ];
}
