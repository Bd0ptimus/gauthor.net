<?php

namespace App;
use Illuminate\Support\Facades\Auth;

use App\Models\ImageType;
class Admin{
    public static function user(){
        return Auth::guard('admin')->user();
    }

    public static function imageType($slug){
        return ImageType::where('slug', $slug)->first()->id;
    }
}


