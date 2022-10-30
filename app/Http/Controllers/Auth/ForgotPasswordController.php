<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

//services
use App\Services\AuthService;
use App\Services\MailControlService;
use App\services\PasswordForgotHandleService;

//Models
use App\Models\User;
class ForgotPasswordController extends BaseController
{
    protected $authService;
    protected $mailControlService;
    protected $pwdForgotHandleService;
    public function __construct(
        AuthService $authService,
        MailControlService $mailControlService,
        PasswordForgotHandleService $pwdForgotHandleService
    )
    {
        $this->authService = $authService;
        $this->mailControlService = $mailControlService;
        $this->pwdForgotHandleService = $pwdForgotHandleService;
    }
    public function index(Request $request){
        if($request->isMethod('POST')){
            $validator=$this->authService->forgotPasswordValidateService($request->all());
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $user = User::where('email', '=', $request->email)->first();
                if(isset($user)){
                    $this->mailControlService->passwordForgotHandle($user);
                    // dd($user);
                    return view('auth.mail.checkMailNotice')->with('user',$user);
                }
                return redirect()->back()->with("pass_email_error",'Email này không tồn tại')->withInput($request->all());
            }
        }
        return view('auth.forgotPassword');
    }

    public function reset($token){
        if(isset($token)){
            $user=$this->mailControlService->passwordResetHandle($token);
            if(isset($user)){
                return view('auth.resetPassword')->with('user',$user);
            }
            return view('auth.mail.checkMailNotice')->with('emailExpired','Email này đã hết hạn rùi, hãy click vào email mới hơn nha');
        }
    }

    public function setPassword(Request $request, $id){
        $validator=$this->authService->resetPasswordValidateService($request->all());
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }else{
            $this->pwdForgotHandleService->resetPassword($request, $id);
            $reloginMessage = User::find($id)->first()->nickname.' đăng nhập lại nha';
            return redirect()->route('auth.login',['reloginMessage'=>$reloginMessage]);
        }
    }

}
