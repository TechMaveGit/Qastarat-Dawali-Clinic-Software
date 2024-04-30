<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\Doctor;
class Patient_future_plan extends Model
{
    use HasFactory;
    protected $table = "patient_future_plans";
    protected $fillable = [
        'patient_id',
        'plan_text',
        'date',
        'doctor_id'
        
    ];
    public function doctor(){
        return  $this->belongsTo(Doctor::class,'doctor_id','id')->select('name','id');
      }
}
