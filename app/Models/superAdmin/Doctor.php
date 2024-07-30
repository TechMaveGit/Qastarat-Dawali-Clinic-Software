<?php

namespace App\Models\superAdmin;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use App\Models\patient\ThyroidDiagnosis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Model implements Authenticatable
{

    use AuthenticableTrait, HasApiTokens, Notifiable;

    public function get_role()
    {
        $permission = DB::table('role_has_permissions')->where('role_id', Auth::guard('doctor')->user()->role_id)->get(['permission_id']);
        return $permission;
    }

    protected $fillable = [
        'title',
        'patient_profile_img',
        'role_id',
        'NursingSchool',
        'Degree',
        'name',
        'email',
        'status',
        'lincense_no',
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
    public function thyroidDiagnoses()
    {
        return $this->hasMany(ThyroidDiagnosis::class, 'doctor_id');
    }



    public function userBranch()
    {
        return $this->hasMany(UserBranch::class, 'patient_id')->select('id', 'patient_id', 'add_branch');
    }

    public function doctorBranch()
    {
        return $this->hasMany(UserBranch::class, 'patient_id')->select('id', 'patient_id', 'add_branch')->where('branch_type', 'doctor');;
    }

    public function staffBranch()
    {
        return $this->hasMany(UserBranch::class, 'patient_id')->select('id', 'patient_id', 'branch_type', 'add_branch');
    }



    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    static public function getEmailSingle($email)
    {
        return Doctor::where('email', '=', $email)->first();
    }
    static public function getTokenSingle($remember_token)
    {
        return Doctor::where('remember_token', '=', $remember_token)->first();
    }
}
