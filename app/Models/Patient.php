<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Crypt;
class Patient extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
    protected $table = "patients";
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'sirname',
        'patient_id',
        'street',
        'country',
        'landline',
        'birth_date',
        'post_code',
        'mobile_no',
        'gendar',
        'town',
        'document_type',
        'remember_token',
        'gp',
        'kin',
        'policy_no',
        'additional_info',
        'tags',
        'is_verified',
        'patient_profile_img',
        'role',
        'email_verified_at'

    ];

    public function getIdAttribute($value)
    {
        return Crypt::encrypt($value);
    }
}
