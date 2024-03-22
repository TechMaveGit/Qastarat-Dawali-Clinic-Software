<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_appointment extends Model
{
    use HasFactory;
    protected $table = "patient_appointments";
    protected $fillable = [
        'patient_id',
        'date',
        'appointment_type',
        'location',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'cost',
        'code',
        'clinic_type',
        'confirmation_immediately'
        
    ];
}
