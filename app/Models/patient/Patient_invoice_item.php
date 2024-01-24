<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_invoice_item extends Model
{
    use HasFactory;
    protected $table = "patient_invoice_items";
    protected $fillable = [
        'patient_id',
        'item_name',
        'cost',
        'code',
        'date'
        
    ];
}
