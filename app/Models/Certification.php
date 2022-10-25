<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $table = 'certifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cv_id',
        'name_certification',
        'certification_path_name'
    ];

    public function cv()
    {
        return $this->belongsTo('App\Models\Cv');
    }
}
