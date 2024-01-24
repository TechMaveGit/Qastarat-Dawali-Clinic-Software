<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_order_imaginary_exam extends Model
{
    use HasFactory;
    protected $table = "patient_order_imaginary_exams";
    protected $fillable = [
        'patient_id',
        'order_imaginary_exam_tests_id'
    ];
}
