<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_imaginary_exam_test extends Model
{
    use HasFactory;
    protected $table = "order_imaginary_exam_tests";
    protected $fillable = [
        'test_name',
    ];
}
