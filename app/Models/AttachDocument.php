<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachDocument extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'attach_documents';

    // Define the fillable fields
    protected $fillable = ['form_type', 'patient_id','attach_type','document','document_title'];
}