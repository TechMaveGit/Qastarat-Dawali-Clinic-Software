<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\Doctor;

class Procedure extends Model
{
    use HasFactory;
    protected $table = "patient_order_procedures";
    protected $fillable = [
        'patient_id',
        'procedure_name',
        'entry',
        'summary',
        'doctor_id'
        
    ];

    public function doctor(){
        return  $this->belongsTo(Doctor::class,'doctor_id','id')->select('name','id');
      }
}
