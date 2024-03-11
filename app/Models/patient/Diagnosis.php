<?php

namespace App\Models\patient;

use App\Models\superAdmin\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;
    protected $table = "patient_diagnosis";
    protected $fillable = [
        'patient_id',
        'title_name',
        'data_value',
        'created_at',
        'updated_at',
        'doctor_id'  
    ];

    public function patient(){
      return  $this->belongsTo(User::class,'patient_id','id');
    }
    public function doctor(){
      return  $this->belongsTo(Doctor::class,'doctor_id','id')->select('name','id');
    }
}
