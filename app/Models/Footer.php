<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table="footers";
    protected $fillable = [
        'title',
        'desc',
        'img',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'footer_content',
        'address',
        'email',
        'phone',
        'custom_date'
    ];
}
