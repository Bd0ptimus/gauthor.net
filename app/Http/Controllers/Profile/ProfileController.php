<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Helper\Util;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
            $darlingProfile = $this->userService->userProfileService($userProfile->darling_id);
            $userProfile->dob = Util::fixdate($userProfile->dob);
            $userAvatar = $this->imgService->takeAvatar($userProfile->id);
            $darlingAvatar = $this->imgService->takeAvatar($userProfile->darling_id);
            $userImages = $userProfile->images;
            // dd(storage_path('app/public'));
            return view('profile.index',[
                'userProfile'=> $userProfile,
                'darlingProfile'=>$darlingProfile,
                'userAvatar'=>$userAvatar??null,
                'darlingAvatar' =>$darlingAvatar??null,
                'darlingOnWatching'=> false,
                'userImages'=>$userImages,

            ]); //->with(['userProfile'=> $userProfile,'userAvatar'=>$userAvatar]);
        }
        return redirect()->back();
    }

    public function darling(Request $request, $darlingId){
        if($darlingId){
            $userProfile = $this->userService->userProfileService($darlingId);
            $userAvatar = $this->imgService->takeAvatar($userProfile->id);
            $userProfile->dob = Util::fixdate($userProfile->dob);
            return view('profile.index',[
                'userProfile'=> $userProfile,
                'userAvatar'=>$userAvatar??null,
                'darlingOnWatching'=> true,
            ]);
        }
    }
}
