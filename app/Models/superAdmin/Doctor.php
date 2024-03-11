<?php

namespace App\Models\superAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use App\Models\patient\ThyroidDiagnosis;
use Auth;
use DB;

class Doctor extends Model implements Authenticatable
{

    public function get_role() {
        $permission = DB::table('role_has_permissions')->where('role_id',Auth::guard('doctor')->user()->role_id)->get(['permission_id']);
        return $permission;
  }


    use HasFactory,AuthenticableTrait;
    protected $fillable = [
        'title',
        'patient_profile_img',
        'role_id',
        'NursingSchool',
        'Degree',
        'name',
        'email',
        'password',
        'doctor_id',
        'user_type',
        'birth_date',
        'gendar',
        'post_code',
        'street',
        'town',
        'country',
        'mobile_no',
        'landline',
        'specialty',
        'qualifications',
        'experience',
        'working_hours',
        'languages_spoken',
        'license_number',
        'license_upload',
        'academic_document_upload',
        'college_name',
        'graduation_year',
        'soft_skill',
        'communication_skill',
        'lab_name',
        'LicenseUpload',
        'AcademicDocumentUpload'

    ];
    public function thyroidDiagnoses() {
        return $this->hasMany(ThyroidDiagnosis::class, 'doctor_id');
    }
}
