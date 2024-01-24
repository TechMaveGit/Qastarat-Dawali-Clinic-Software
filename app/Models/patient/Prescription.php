<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = "patient_prescriptions";
    protected $fillable = [
        'patient_id',
        'prescription'
        
    ];
}
