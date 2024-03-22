<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_vital extends Model
{
    use HasFactory;
    protected $table = "patient_vitals";
    protected $fillable = [
        'patient_id',
        'date',
        'measurement',
        'value'

    ];
}
