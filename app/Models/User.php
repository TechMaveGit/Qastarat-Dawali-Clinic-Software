<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'sirname',
        'patient_id',
        'street',
        'country',
        'landline',
        'birth_date',
        'post_code',
        'mobile_no',
        'gendar',
        'town',
        'document_type',
        'remember_token',
        'gp',
        'kin',
        'policy_no',
        'additional_info',
        'tags',
        'is_verified',
        'patient_profile_img',
        'role',
        'email_verified_at'

    ];

    public function getIdAttribute($value)
    {
        return Crypt::encrypt($value);
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
