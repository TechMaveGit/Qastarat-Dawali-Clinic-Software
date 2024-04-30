<?php

namespace App\Models\patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress_note_canned_text extends Model
{
    use HasFactory;
    protected $table="progress_note_canned_text";
    protected $fillable = [
        'canned_name',
        ];
}
