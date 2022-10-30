<?php

namespace App\Services;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


//service
use App\Services\PasswordForgotHandleService;
use App\Services\AuthService;

use Exception;
class MailControlService
{
    protected $passwordForgotHandleService;
    protected $authService;
    public function __construct(PasswordForgotHandleService $passwordForgotHandleService,
        AuthService $authService
    ){
        $this->passwordForgotHandleService = $passwordForgotHandleService;
        $this->authService = $authService;
    }
    public function passwordForgotHandle($user){
        $this->passwordForgotHandleService->sendConfirmMail($user);
    }

    public function passwordResetHandle($token){
        $user = $this->authService->checkToken($token);
        return $user;
    }
}
