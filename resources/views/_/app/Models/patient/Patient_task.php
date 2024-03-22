<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_task extends Model
{
    use HasFactory;
    protected $table = "patient_tasks";
    protected $fillable = [
        'patient_id',
        'date',
        'text',
        'name',
        'task'
        
    ];
}
