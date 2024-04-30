<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\Doctor;

class SupportiveTreatment extends Model
{
    use HasFactory;
    protected $table = "patient_supportive_treatments";
    protected $fillable = [
        'patient_id',
        'title',
        'sub_title',
        'treatment',
        'doctor_id'
        
    ];

    public function doctor(){
        return  $this->belongsTo(Doctor::class,'doctor_id','id')->select('name','id');
      }
}
