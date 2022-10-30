<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Str;
use Carbon\Carbon;

//model
use App\Models\Images;

//repo
use App\Repositories\ImageRepository;

use Exception;
class ImageService
{
    protected $imgRepo;

    public function __construct(ImageRepository $imgRepo){
        $this->imgRepo = $imgRepo;
    }

    public function takeAvatar($userId){
        return $this->imgRepo->takeAvatar($userId);
    }

    public function setAvatar($userId,$imageNewPath){
        DB::beginTransaction();
        try{
            $newAvatar=$this->imgRepo->setAvatar($userId,$imageNewPath);
            DB::commit();
            return $newAvatar;
        }catch(Exception $e){
            DB::rollBack();
            Log::debug('Error in set avatar : '. $e );
            return null;
        }
    }
}
