<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experience';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cv_id',
        'job',
        'start_date',
        'end_date',
        'company',
        'country',
        'city',
        'company_description',
    ];
}
