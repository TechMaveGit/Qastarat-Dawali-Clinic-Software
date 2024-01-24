<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_refer extends Model
{
    use HasFactory;
    protected $table="patient_refers";
    protected $fillable=[
        'patient_id',
        'doctor_id',
        'refer_doctor_id'

    ];
}
