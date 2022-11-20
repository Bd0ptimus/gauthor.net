<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
//use Your Model

use App\Models\Images;
use App\Models\ForgotPassword;
use App\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\LOG;
/**
 * Class UserRepository.
 */
class ImageRepository extends BaseRepository
{
    protected $model;
    public function __construct(Images $model)
    {
        $this->model = $model;
    }
    /**
     * @return string
     *  Return the model
     */

    public function takeAvatar($userId){
        return $this->model->whereHas('imageType', function($query) {
            $query->where('slug', IMAGE_TYPE_SLUGS[0]);
        })->where('user_id', $userId)->first();
    }

    public function setAvatar($userId,$imageNewPath){
        $currentAvatar = $this->model->where(
            [
            'user_id'=> $userId,
            'img_type'=>IMAGE_AVATAR,
            ]
        )->first();
        if($currentAvatar){
            $currentAvatar->update([
                'img_type'=>IMAGE_PERSONAL,
            ]);
        }

        return $this->model->create([
            'user_id'=>$userId,
            'img_path'=>'storage/images/'.$imageNewPath,
            'img_type'=>IMAGE_AVATAR,
        ]);
    }

    public function setExistedImgAsAvatar($imageId){
        $currentAvatar = $this->model->where(
            [
            'user_id'=> Admin::user()->id,
            'img_type'=>IMAGE_AVATAR,
            ]
        )->first();
        if($currentAvatar){
            $currentAvatar->update([
                'img_type'=>IMAGE_PERSONAL,
            ]);
        }

        $newAvatar = $this->model->where('id', $imageId)->first()->update([
            'img_type'=>IMAGE_AVATAR,
        ]);
        return $newAvatar;
    }

    public function deleteImage($imageId){
        $image=$this->model->find($imageId);
        if(File::exists(public_path($image->img_path))){
            File::delete(public_path($image->img_path));
        }
        $image->delete();
    }

    public function changeImageStatus($imageId, $status){
        $image=$this->model->where('id',$imageId)->first();
        Log::debug('image found : '. print_r($image, true));
        if(isset($image)){
            Log::debug('change status in repo');
            $image->update([
                'status'=>$status,
            ]);
        }
        return $image;
    }

}
