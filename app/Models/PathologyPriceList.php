<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathologyPriceList extends Model
{
    use HasFactory;
    protected $table="pathology_price_list";
    protected $fillable = [
        'test_name',
        'test_code',
        'included_tests',
        'turnaround',
        'note',
        'price'
        ];

}
