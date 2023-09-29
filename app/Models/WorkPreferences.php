<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPreferences extends Model
{
    use HasFactory;

    protected $table = 'work_preferences';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'desired_job',
        'type_contract',
        'work',
        'practices',
        'dual_education',
        'desired_salary',
        'hours',
        'avaible_date',
        'preferred_state',
        'preferred_city',
        'preferred_country',
        'specific_profile',
        'general_profile',
        'area',
        'change_city',
        
    ];
}
