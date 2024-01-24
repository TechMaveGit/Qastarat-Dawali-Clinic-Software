<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_order_lab extends Model
{
    use HasFactory;
    protected $table = "patient_order_labs";
    protected $fillable = [
        'patient_id',
        'order_lab_tests_id'
        
    ];
}
