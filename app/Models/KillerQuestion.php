<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KillerQuestion extends Model
{
    use HasFactory;

    protected $table = 'killer_questions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'question',
        'description',
    ];

    public function offer()
    {
        return $this->belongsTo('App\Models\Offer');
    }
}
