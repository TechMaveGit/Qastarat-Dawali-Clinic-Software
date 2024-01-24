<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UterineEmboDiagnosis extends Model
{
    use HasFactory;
    protected $table = "patient_uterineEmbo_diagnosis";
    protected $fillable = [
        'patient_id',
        'title_name',
        'data_value'  
    ];
}
