<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaricoseAblationDiagnosis extends Model
{
    use HasFactory;
    protected $table="patient_varicose_ablation_diagnosis";
    protected $fillable = [
        'patient_id',
        'title_name',
        'data_value'  
    ];
}
