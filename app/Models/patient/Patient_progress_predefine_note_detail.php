<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_progress_predefine_note_detail extends Model
{
    use HasFactory;
    protected $table="patient_progress_note_details";
    protected $fillable = [
        'patient_id',
        'progress_note_canned_text_id',
        'progress_note_contents_id',
        'describe'
    ];
}
