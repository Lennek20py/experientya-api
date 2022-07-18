<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

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
    ];

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = bcrypt($valor);
        }
    }
}
