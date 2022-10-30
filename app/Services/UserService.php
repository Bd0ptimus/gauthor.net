<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

//model
use App\Models\User;

//repo
use App\Repositories\UserRepository;

use App\Admin;
use Exception;
class UserService
{
    protected $userRepo;
    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }

    public function userProfileService($userId){
        return $this->userRepo->takeUserProfile($userId);
    }
}
