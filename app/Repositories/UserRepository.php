<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
//use Your Model

use App\Models\User;
use App\Models\ForgotPassword;
/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    /**
     * @return string
     *  Return the model
     */
    public function takeUserByResetPasswordToken($token)
    {
        // return $this->model->where('id',ForgotPassword::where('activation_code', $token)->first()->user_id)->first();
        return $this->model::whereHas('forgotPasswordCode', function($query) use($token){
            $query->where('activation_code', $token);
        })->first();
    }

    public function resetUserPassword($pwd, $id){
        // dd($pwd);
        User::find($id)->update(
            ['password' =>bcrypt($pwd)]
        );
    }

    public function takeUserProfile($userId){
        // dd($userId);
        return User::with('images')->where('id',$userId)->first();
    }

}
