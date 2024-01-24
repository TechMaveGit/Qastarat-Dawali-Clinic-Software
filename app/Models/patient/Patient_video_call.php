<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_video_call extends Model
{
    use HasFactory;
    protected $table = "patient_video_calls";
    protected $fillable = [
        'patient_id',
        'date',
        'meeting_url'
       
        
    ];
}
