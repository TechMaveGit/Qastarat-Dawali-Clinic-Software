<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Patient extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
    protected $table = "patients";
    protected $fillable = [
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
        'document_type'

    ];
}
