<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_symptom extends Model
{
    use HasFactory;
    protected $table = "patient_symptoms";
    protected $fillable = [
        'patient_id',
        'symptom_name'
        
    ];
}
