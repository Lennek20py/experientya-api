<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyDegree extends Model
{
    use HasFactory;

    protected $table = 'study_degree';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cv_id',
        'school_name',
        'study_level',
        'study_specialty',
        'study_tittle',
        'study_certificate',
        'study_status',
        'starting_month',
        'starting_year',
        'finished_month',
        'finished_year',
        'study_city',
        'study_state',
        'study_country',
        'file_degree_path'
    ];
}
