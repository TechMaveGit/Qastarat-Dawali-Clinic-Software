<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invistigation extends Model
{
    use HasFactory;
    protected $table = "patient_invistigations";
    protected $fillable = [
        'patient_id',
        'invistigation',
        
       
        
    ];
}
