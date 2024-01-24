<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_insurer extends Model
{
    use HasFactory;
    protected $table = "patient_insurers";
    protected $fillable = [
        'patient_id',
        'insurer_name',
        'insurance_number',
        'status'
        
    ];
}
