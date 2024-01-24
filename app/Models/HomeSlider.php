<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $table="home_sliders";
    protected $fillable = [
        'title',
        'desc',
        'icon_img',
        'slider_img',
        'doctors',
        'happy_patient',
        'years_experience',
        'satisfaction'
    ];
}
