<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_past_surgical_history extends Model
{
    use HasFactory;
    protected $table = "patient_past_surgical_histories";
    protected $fillable = [
        'patient_id',
        'diseases_name',
        'describe'
        
    ];
}
