<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_lab_test extends Model
{
    use HasFactory;
    protected $table = "order_lab_tests";
    protected $fillable = [
        'test_name',
        
    ];
}
