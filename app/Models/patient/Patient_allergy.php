<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_allergy extends Model
{
    use HasFactory;
    protected $table = "patient_allergies";
    protected $fillable = [
        'patient_id',
        'allergy_name',
        'form_type'
        
    ];
}
