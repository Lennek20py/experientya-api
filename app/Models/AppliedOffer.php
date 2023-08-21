<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class AppliedOffer extends Model
{
    use HasFactory;
    protected $table = 'applied_offers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cv_id',
        'offer_id',
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
}
