<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_special_note extends Model
{
    use HasFactory;
    protected $table = "patient_special_notes";
    protected $fillable = [
        'patient_id',
        'note_text'
        
       
        
    ];
}
