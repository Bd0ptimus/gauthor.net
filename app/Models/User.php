<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//Models
use App\models\Role;
use App\Models\ForgotPassword;
use App\Models\Images;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'dob',
        'quote',
    ];

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
    ];

    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function forgotPasswordCode(){
        return $this->hasOne(ForgotPassword::class, 'user_id', 'id');
    }

    public function images(){
        return $this->hasMany(Images::class, 'user_id', 'id');
    }

    public function isRole($role=''){
        return $this->model->role_id == $role;
    }

    public function inRoles($roles=[]){
        return in_array( $this->role_id, $roles);
    }


}
