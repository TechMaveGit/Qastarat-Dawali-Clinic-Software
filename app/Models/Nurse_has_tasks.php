<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Nurse_has_tasks extends Model implements Authenticatable
{
    protected $table = "nurse_has_tasks";

    use HasFactory, AuthenticableTrait;
    protected $fillable = [
        'nurse_task_id',
        'nurse_id',
        'status',
        'appoinment_date',
        'appoinment_time'
       
    ];
}
