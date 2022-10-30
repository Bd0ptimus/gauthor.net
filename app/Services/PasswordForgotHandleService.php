<?php

namespace App\Services;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\PasswordForgotConfirm;

//service
use App\Services\AuthService;

//repository
use App\Repositories\UserRepository;


use Exception;
class PasswordForgotHandleService
{
    protected $authService;
    protected $userRepo;
    public function __construct(AuthService $authService,
        UserRepository $userRepo
    ){
        $this->authService = $authService;
        $this->userRepo = $userRepo;
    }
    public function sendConfirmMail($user){
        $token=$this->authService->createActivation($user);
        $user->activation_link = route('auth.forgot.reset', $token);
        $mailable = new PasswordForgotConfirm($user);
        Mail::to($user->email)->send($mailable);
    }

    public function resetPassword($request, $id){
        $this->userRepo->resetUserPassword($request->password, $id);
    }
}
