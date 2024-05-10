<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\Doctor;
use App\Models\User;
class ThyroidDiagnosis extends Model
{
    use HasFactory;
    protected $table = "patient_thyroid_diagnosis";
    protected $fillable = [
        'patient_id',
        'doctor_id' ,
        'title_name',
        'data_value',
        'AnnotateimageData',
        'created_at',
        'updated_at',
      
    ];

    
    public function doctor(){
      return  $this->belongsTo(Doctor::class,'doctor_id','id')->select('name','id');
    }
    public function patient(){
      return  $this->belongsTo(User::class,'patient_id','id')->withoutGlobalScopes();
    }
}
