<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyPlan extends Model
{
    use HasFactory;

    protected $table = 'company_plan';

    protected $appends = [
        'date'
    ];

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }
}
