<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_clinical_exam extends Model
{
    use HasFactory;
    protected $table = "patient_clinical_exams";
    protected $fillable = [
        'patient_id',
        'write_text'
        
       
        
    ];
}
