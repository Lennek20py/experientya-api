<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $guard = 'company';

    protected $fillable = [
        'company_name',
        'email',
        'password',
        'profile_photo_path',
        'company_phone_number',
        'company_address',
        'company_postal_code',
        'company_fiscal_address',
        'RFC',
        'responsible_first_name',
        'responsible_last_name',
        'responsible_phone_number',
        'description',
        'state_id',
        'town_id',
        'sector_id'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_link'
    ];

    public function setPasswordAttribute($valor)
    {
        if (!empty($valor)) {
            $this->attributes['password'] = bcrypt($valor);
        }
    }

    public function getProfilePhotoLinkAttribute()
    {
        return asset('storage/' . $this->attributes['profile_photo_path']);
    }

    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Models\Plan');
    }

    public function plan()
    {
        return $this->hasMany('App\Models\CompanyPlan', 'company_id');
    }

    public function purchased_plans()
    {
        return $this->hasMany('App\Models\CompanyPlan', 'company_id')->select(['spaces_available', 'created_at']);
    }
}
