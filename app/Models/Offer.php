<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'title_job',
        'description',
        'type_job',
        'type_horary',
        'type_of_contract',
        'profile_description',
        'start_date',
        'salary',
        'payment_type',
        'offer_address',
        'state_id',
        'town_id',
        'area_id',
        'general_id',
        'specific_id',
        'company_id',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
