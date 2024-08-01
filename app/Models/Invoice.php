<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table="invoices";
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'invoice_no',
        'finalAmount',
        'paidStatus'
    ];


    public function tasks(){
        return $this->hasMany(Task::class,'invoice_id','id');
    }
}
