<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatWeDo extends Model
{
    use HasFactory;
    protected $table="what_we_do";
    protected $fillable = [
        'title',
        'desc',
        'img',
    ];
}
