<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Helper\Util;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\LOG;

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
        $this->middleware('checkuserlogin');
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
        return redirect()->route('auth.login');
    }

    public function uploadAvatar(Request $request, $userId){
        // LOG::debug('user id : ' . $userId);
        // LOG::debug('avatar : ' . print_r($request->avatarUpload,true));
        // LOG::debug('avatar after upload : ' . $this->imgService->storeAvatar($userId, $request->avatarUpload));
        try{
            LOG::debug('image uploaded : ' . print_r($request->avatarUpload,true) );
            $imgUpload= $this->imgService->storeAvatar($userId, $request->avatarUpload);
        }catch(Exception $e){
            response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'Xóa thành công', 'new_avt'=>asset($imgUpload->img_path)]);

    }

    public function deleteImage(){
        $imageId = request('id');
        // LOG::debug('Deleting image : '.$imageId1);
        try{
            $this->imgService->deleteImage($imageId);
        }catch(Exception $e){
            response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'Xóa thành công']);
    }

    public function setAvatar(){
        $imageId = request('id');
        try{
            $newAvatar=$this->imgService->setExistedImgAsAvatar($imageId);
        }catch(Exception $e){
            response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'Đổi avatar thành công']);
    }

    public function checkDetailImage(){
        $imageId = request('id');
        try{
            $image=$this->imgService->takeImageById($imageId);
        }catch(Exception $e){
            response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0,
        'msg' => 'Lấy thông tin ảnh thành công',
        'img_url'=>asset($image->img_path),
        'img_status'=>$image->status??'']);
    }

    public function loadUserImages(Request $request, $userId){
        try{
            $data = $this->imgService->takeAllImagesOfUser($userId);
        }catch(Exception $e){
            response()->json(['error' => 1, 'msg' => 'Đã có lỗi']);
        }
        return response()->json(['error' => 0, 'msg' => 'Lấy ảnh thành công', 'data'=>$data]);
    }

    public function darling(Request $request, $darlingId){
        if($darlingId){
            $userProfile = $this->userService->userProfileService($darlingId);
            $userAvatar = $this->imgService->takeAvatar($userProfile->id);
            $userProfile->dob = Util::fixdate($userProfile->dob);
            $userImages = $userProfile->images;
            return view('profile.index',[
                'userProfile'=> $userProfile,
                'userAvatar'=>$userAvatar??null,
                'darlingOnWatching'=> true,
                'userImages'=>$userImages,
            ]);
        }
    }
}
