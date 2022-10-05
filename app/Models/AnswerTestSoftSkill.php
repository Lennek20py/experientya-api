<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class AnswerTestSoftSkill extends Model
{
    use HasFactory;
    protected $table = 'answers_test_soft_skills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'test_id',
        'question',
        'soft_skill_tittle',
        'answer_skill',
        'fullAnswers',
        'saved',
        'answer_date'
    ];
}
