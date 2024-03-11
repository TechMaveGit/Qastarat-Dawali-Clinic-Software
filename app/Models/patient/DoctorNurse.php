<?php

namespace App\Models\patient;

use App\Models\superAdmin\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorNurse extends Model
{
    use HasFactory;
    protected $table = "doctor_nurse";
    protected $fillable = [
        'doctor_id',
        'nurse_id',
        'status',
        'created_at',
        'updated_at'
        
    ];
    
  
}
