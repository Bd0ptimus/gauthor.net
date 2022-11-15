<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;

//model
use App\Models\Images;

//repo
use App\Repositories\ImageRepository;
use App\Repositories\UserRepository;


use Exception;

class ImageService
{
    protected $imgRepo;
    protected $userRepo;

    public function __construct(ImageRepository $imgRepo,
    UserRepository $userRepo)
    {
        $this->imgRepo = $imgRepo;
        $this->userRepo = $userRepo;
    }

    public function deleteImage($imageId)
    {
        $this->imgRepo->deleteImage($imageId);
    }

    public function setExistedImgAsAvatar($imageId){
        DB::beginTransaction();
        try{
            $newAvatar= $this->imgRepo->setExistedImgAsAvatar($imageId);
            DB::commit();
            return $newAvatar;
        }catch(Exception $e){
            LOG::debug('Error in set existed img as avatar : '. $e);
            DB::rollBack();
        }
    }

    private function generateName()
    {
        $length = 20;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM';
        $string = "";

        for ($p = 0; $p < $length; $p++) {
            @$string .= $characters[mt_rand(0, strlen($characters))];
        }

        return $string;

        // return bcrypt((int)DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''), new \DateTimeZone('UTC'))->format("Uu"));
    }

    public function storeAvatar($userId, $image)
    {
        $imgName = $this->generateName() . '.' . $image->extension();
        LOG::debug('generate name : ' . $this->generateName() );
        LOG::debug('extension name : ' . $image->extension() );
        LOG::debug('name : ' . $imgName  );
        $image->move(storage_path('app/public/images'), $imgName);
        LOG::debug('image name : ' . $imgName);
        return $this->setAvatar($userId, $imgName);
    }

    public function takeAllImagesOfUser($userId){
        return $this->userRepo->findById($userId,['*'], ['images']);
    }

    public function takeImageById($imageId){
        return $this->imgRepo->findById($imageId,['*']);
    }

    public function takeAvatar($userId)
    {
        return $this->imgRepo->takeAvatar($userId);
    }

    public function setAvatar($userId, $imageNewPath)
    {
        DB::beginTransaction();
        try {
            $newAvatar = $this->imgRepo->setAvatar($userId, $imageNewPath);
            DB::commit();
            return $newAvatar;
        } catch (Exception $e) {
            DB::rollBack();
            Log::debug('Error in set avatar : ' . $e);
            return null;
        }
    }
}
