<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurDoctor extends Model
{
    use HasFactory;
    protected $table="our_doctors";
    protected $fillable = [
        'title',
        'desc',
        'img',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link'
    ];
}
