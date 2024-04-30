<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\superAdmin\Doctor;
class Patient_progress_note extends Model
{
    use HasFactory;
    protected $table="patient_progress_notes";
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'progress_note_canned_text_id',
        'progress_note_contents_id',
        'voice_recognition',
        'summery',
        'day',
        'appointment_type',
        'date',
        'details',
        'email',
        'mobile_no',
        'recall_reminder',
        'invoice_item'];

        public function doctor(){
            return  $this->belongsTo(Doctor::class,'doctor_id','id')->select('name','id');
          }
          public function progressNote(){
            return  $this->belongsTo(Progress_note_canned_text::class,'progress_note_canned_text_id','id')->select('canned_name','id');
          }
}
