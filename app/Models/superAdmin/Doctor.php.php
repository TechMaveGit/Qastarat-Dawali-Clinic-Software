<?php

namespace App\Models\superAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Doctor extends Model
{
    protected $fillable = [
        'title',
        'name',
        'date_of_birth',
        'patient_profile_img',
        'gender',
        'post_code',
        'street',
        'town',
        'role_id',
        'country',
        'email_address',
        'mobile_phone',
        'landline',
        'specialty',
        'qualifications',
        'experience',
        'working_hours',
        'languages_spoken',
        'license_number',
        'license_upload',
        'academic_document_upload',
    ];
}
