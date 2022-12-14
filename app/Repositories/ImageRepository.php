<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
//use Your Model

use App\Models\Images;
use App\Models\ForgotPassword;
use App\Admin;

/**
 * Class UserRepository.
 */
class ImageRepository //extends BaseRepository
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
            'img_path'=>'storage/'.explode('/',$imageNewPath)[1],
            'img_type'=>IMAGE_AVATAR,
        ]);
    }

}
