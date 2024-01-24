<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_progress_note extends Model
{
    use HasFactory;
    protected $table="patient_progress_notes";
    protected $fillable = [
        'patient_id',
        'progress_note_canned_text_id',
        'progress_note_contents_id',
        'voice_recognition',
        'day',
        'appointment_type',
        'date',
        'details',
        'email',
        'mobile_no',
        'recall_reminder',
        'invoice_item'];
}
