<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
    protected $table = "patient_order_procedures";
    protected $fillable = [
        'patient_id',
        'procedure_name',
        'entry',
        'summary'
        
    ];
}
