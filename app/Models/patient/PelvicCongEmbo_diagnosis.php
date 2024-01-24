<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelvicCongEmbo_diagnosis extends Model
{
    use HasFactory;
    protected $table="patient_pelvicCongEmbo_diagnosis";
    protected $fillable = [
        'patient_id',
        'title_name',
        'data_value'  
    ];
}
