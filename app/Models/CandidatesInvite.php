<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatesInvite extends Model
{
    use HasFactory;
    protected $table = 'candidates_invites';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cv_id',
        'offer_id',
        'company_id',
        'status'
    ];

    public function offers()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    public function cvid()
    {
        return $this->belongsTo(Cv::class, 'cv_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
