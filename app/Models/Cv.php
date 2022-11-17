<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $table = 'cv';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'position',
        'verified',
        'report_path',
    ];

    public function certifications()
    {
        return $this->hasMany('App\Models\Certification');
    }

    public function lenguages()
    {
        return $this->hasMany('App\Models\Language');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
    }

    public function studyDegrees()
    {
        return $this->hasMany('App\Models\StudyDegree');
    }

    public function userSkills()
    {
        return $this->hasMany('App\Models\UserSkill');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
