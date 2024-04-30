<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class BookAppointment extends Model implements Authenticatable
{
    protected $table = "book_appointments";

    use HasFactory, AuthenticableTrait;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'clinician_id',
        'priority',
        'appointment_type',
        'status',
        'location',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'cost',
        'code',
        'clinician_id',
        'confirmation',
       
    ];
}
