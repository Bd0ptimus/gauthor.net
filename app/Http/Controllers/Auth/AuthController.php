<?php

namespace App\Http\Controllers\auth;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

//service
use App\Services\AuthService;
//Models
use App\Models\User;

use App\Admin;

class AuthController extends BaseController
{
    protected $authService;
    public function __construct(
        AuthService $authService
    )
    {
        $this->authService = $authService;
    }

    public function login(Request $request){
        if($request->isMethod('POST')){
            $validator=$this->authService->loginValidateService($request->all());
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            } else {
                $user = User::where('email', '=', $request->email)->first();
                if(isset($user)){
                    if(Hash::check($request->password, $user->password)){
                        Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password], true);
                        // dd(Admin::user()->inRoles([ROLE_ADMIN]));
                        return redirect()->route('profile.index');
                    }
                    return redirect()->back()->with("pass_email_error",'Mật khẩu không đúng')->withInput($request->all());
                }
                return redirect()->back()->with("pass_email_error",'Email này không tồn tại')->withInput($request->all());
            }
        }
        // Auth::guard('admin')->logout();
        return view('auth.index')->with('reloginMessage', $request->reloginMessage);
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('auth.login');
    }
}
