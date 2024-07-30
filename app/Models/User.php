<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use App\Models\patient\ThyroidDiagnosis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model implements Authenticatable
{
     use AuthenticableTrait, HasApiTokens, Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'email',
        'password',
        'sirname',
        'patient_id',
        'street',
        'status',
        'country',
        'landline',
        'birth_date',
        'post_code',
        'mobile_no',
        'gendar',
        'doctor_id',
        'town',
        'document_type',
        'remember_token',
        'gp',
        'kin',
        'enterIdNumber',
        'policy_no',
        'additional_info',
        'tags',
        'is_verified',
        'patient_profile_img',
        'customFile',
        'role',
        'email_verified_at',
        'title'
    ];

    // public function getIdAttribute($value)
    // {
    //     return Crypt::encrypt($value);
    // }


    public function thyroidDiagnoses() {
        return $this->hasMany(ThyroidDiagnosis::class, 'patient_id')->select('title_name','created_at','patient_id','id');
    }

    public function userBranch() {
        return $this->hasMany(UserBranch::class, 'patient_id', 'id')->select('id','patient_id','add_branch')->where('branch_type','patient');
    }

   

    // public function setIdAttribute($value)
    // {
    //     $this->attributes['id'] = Crypt::decrypt($value);
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }
    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }
}
