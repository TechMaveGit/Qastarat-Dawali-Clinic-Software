<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_current_med extends Model
{
    use HasFactory;
    protected $table = "patient_current_meds";
    protected $fillable = [
        'patient_id',
        'drug_name',
        'frequency',
        'duration',
        'stopped',
        'stopped_date',
        'code',
        'today_date',
        'forn_type'
       
        
    ];
}
