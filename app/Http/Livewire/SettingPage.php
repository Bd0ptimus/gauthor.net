<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Helper\Util;
//Services
use App\Services\ImageService;
use App\Services\UserService;


//Models
use App\Models\User;
use App\Admin;

class SettingPage extends Component
{
    use WithFileUploads;
    protected $imageService;
    protected $userService;



    public $userName;
    public $userNickname;
    public $userDob;
    public $userQuote;
    public $userAvatar;
    public $photoUpload;


    protected $listeners = ['avatarUploaded' => 'uploadAvatar'];

    public function boot(ImageService $imageService,
    UserService $userService){
        $this->imageService = $imageService;
        $this->userService = $userService;
    }

    public function init(){
        $user = User::find(Admin::user() !== null? Admin::user()->id:null);
        $this->userName = $user->name;
        $this->userNickname = $user->nickname;
        $this->userDob = $user->dob;
        $this->userQuote = $user->quote;
        $this->userAvatar =$this->imageService->takeAvatar($user->id);
    }

    public function updatedPhotoUpload(){
        Log::debug("in updated Photo");
        $this->validate(
            [
                'photoUpload'=>'image|max:10240',
            ],
            [
                'photoUpload.image'=>'Phải up ảnh chớ',
                'photoUpload.max'=>'Chọn ảnh khác nào chứ ảnh này lớn quá',
            ]
        );
        $data['avatar']=$this->photoUpload->temporaryUrl();
        $data['modal-title']='Xem nè, có phải '.$this->userNickname.' muốn update avatar này không?';
        $this->dispatchBrowserEvent('user-avatar-updated', ['avatarData'=>$data]);
    }

    public function uploadAvatar(){
        $photoName = $this->photoUpload->store('public');
        $this->userAvatar =$this->imageService->setAvatar(Admin::user()->id,$photoName );
        $data['avatar_url']=asset($this->userAvatar->img_path);
        $userImages = $this->userService->userProfileService(Admin::user()->id)->images;

        // dd($data['avatar']);
        $this->dispatchBrowserEvent('user-avatar-updated-complete', ['avatarData'=>$data, 'userImages'=>$userImages]);
    }

    public function saveUserInfo(){
        Log::debug(" in save User : ");

        $this->validate(
            [
                'userName'=>'required',
                'userDob'=>'required|before:today',
            ],
            [
                'userName.required' => 'Tên là phải có nha',
                'userDob.required' => 'Ủa, không có ngày sinh hỏ',
                'userDob.before' => 'Ngày sinh gì kỳ vậy nhỏ',
            ]
        );
        $user = User::find(Admin::user()->id);
        $user->update([
            "name"=>$this->userName,
            "nickname"=>$this->userNickname,
            "dob"=>$this->userDob,
            "quote"=>$this->userQuote
        ]);
        $user->dob=Util::fixdate($user->dob);
        $this->dispatchBrowserEvent('user-info-setting-updated', ['user'=>($user)]);
    }

    public function render()
    {
        return view('livewire.setting.infoSetting');
    }
}
