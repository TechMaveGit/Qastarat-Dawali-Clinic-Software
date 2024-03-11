<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\doctor;
class Patient_order_imaginary_exam extends Model
{
    use HasFactory;
    protected $table = "patient_order_imaginary_exams";
    protected $fillable = [
        'patient_id',
        'test_id',
        'doctor_id',
        'form_type',
        'status'
    ];

    public function test(){
        return $this->belongsTo(Order_imaginary_exam_test::class, 'test_id')->select('id','test_name','duration');
    }
    public function doctor(){
        return $this->belongsTo(doctor::class, 'doctor_id')->select('id','name');
    }
    
}
