<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\doctor;
class Patient_order_lab extends Model
{
    use HasFactory;
    protected $table = "patient_order_labs";
    protected $fillable = [
        'patient_id',
        'order_lab_tests_id'
        
    ];
    
    public function doctor(){
        return $this->belongsTo(doctor::class, 'doctor_id')->select('id','name');
    }

}
