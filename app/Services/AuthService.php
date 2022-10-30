<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

//model
use App\Models\ForgotPassword;

//repo
use App\Repositories\UserRepository;

use Exception;
class AuthService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }
    public function loginValidateService($request){
        $messages = [
            'required' => ':attribute bắt buộc phaỉ được nhập.',
            'email'    => ':attribute không đúng định dạng',
            'min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'email.max' => 'Email chỉ có tối đa 255 ký tự',
            'password.max' => 'Mật khẩu chỉ có tối đa 255 ký tự',
            'regex' => 'Mật khẩu phải bao gồm ký tự viết hoa, ký tự viết thường, số'

        ];

        $validator = Validator::make($request, [
            'email'    => 'required|email|max:255',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/',
            ],

        ], $messages);

        return $validator;
    }

    public function forgotPasswordValidateService($request){
        $messages = [
            'required' => ':attribute bắt buộc phaỉ được nhập.',
            'email'    => ':attribute không đúng định dạng',
            'email.max' => 'Email chỉ có tối đa 255 ký tự',
        ];
        $validator = Validator::make($request, [
            'email'    => 'required|email|max:255',
        ], $messages);
        return $validator;
    }

    public function resetPasswordValidateService($request){
        $messages = [
            'min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.max' => 'Mật khẩu chỉ có tối đa 255 ký tự',
            'regex' => 'Mật khẩu phải bao gồm ký tự viết hoa, ký tự viết thường, số'
        ];
        $validator = Validator::make($request, [
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/',
            ],
        ], $messages);
        return $validator;
    }

    public function createActivation($user){
        $activationCode = $this->getToken();
        ForgotPassword::updateOrCreate(["user_id"=>$user->id],
        ["activation_code"=>$activationCode],
        ["created_at" => new Carbon()]);
        return $activationCode;
    }


    private function getToken(){
        return hash_hmac('sha256', Str::random(40), config('app.key'));
    }

    public function getActivation($user){
        return ForgotPassword::where('user_id',$user->id)->first();
    }

    public function checkToken($token){
        $user = $this->userRepo->takeUserByResetPasswordToken($token);
        return $user??null;
    }
}
