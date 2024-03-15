<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Lab_has_tasks extends Model implements Authenticatable
{
    protected $table = "lab_has_tasks";

    use HasFactory, AuthenticableTrait;
    protected $fillable = [
        'nurse_task_id',
        'lab_id',
        'status',
        'appoinment_date',
        'appoinment_time',
        'document'
       
    ];
}
