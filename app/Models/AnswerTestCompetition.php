<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerTestCompetition extends Model
{
    use HasFactory;
    protected $table = 'answers_test_comp';
    protected $primaryKey = 'id';
    protected $fillable = [
        'test_complete_id',
        'question_number',
        'best_word',
        'worst_word',
        'fullAnswers',
        'saved'
    ];
}
