<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Helper\Util;
use Illuminate\Support\Facades\Storage;
//services
use App\Services\UserService;
use App\Services\ImageService;


//models
use App\Models\User;

use App\Admin;
class ProfileController extends BaseController
{
    protected $userService;
    protected $imgService;
    public function __construct(UserService $userService,
    ImageService $imgService){
        $this->userService = $userService;
        $this->imgService = $imgService;
    }
    public function index(){
        if(Admin::user() !== null){
            $userProfile = $this->userService->userProfileService(Admin::user()->id);
            $userProfile->dob = Util::fixdate($userProfile->dob);
            $userAvatar = $this->imgService->takeAvatar($userProfile->id);
            // dd($userAvatar);
            return view('profile.index',[
                'userProfile'=> $userProfile,
                'userAvatar'=>$userAvatar??null,

            ]); //->with(['userProfile'=> $userProfile,'userAvatar'=>$userAvatar]);
        }
        return redirect()->back();
    }
}
