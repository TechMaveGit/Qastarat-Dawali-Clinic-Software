<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Accountant extends Model
{
    protected $fillable = [
        'title',
        'email',
        'nurses_id',
        'name',
        'birth_date',
        'gender',
        'post_code',
        'street',
        'town',
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
