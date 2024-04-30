<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\Doctor;
use App\Models\User;
class GeneralDiagnosis extends Model
{
    use HasFactory;
    protected $table = "patient_general_diagnosis";
    protected $fillable = [
        'id',
        'patient_id',
        'doctor_id' ,
        'title_name',
        'data_value',
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
