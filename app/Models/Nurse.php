<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Nurse extends Model implements Authenticatable
{
    protected $table = "nurse_tasks";

    use HasFactory, AuthenticableTrait;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'nurse_id',
        'pathology_price_list_id',
        'status',
        'form_type',
        'test_type'
       
    ];
}
