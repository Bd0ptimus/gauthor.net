<?php

namespace App\Http\Controllers\Helper;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\User;
class Util extends BaseController
{
    public function addPasswordForAdmin(){
        User::find(3)->update([
            "name"=>"Bùi Dũng",
            "email"=>"thedung.1292@gmail.com",
            "password"=>bcrypt('Buidung1292'),
            "gender" => 1,
        ]);

        User::find(4)->update([
            "name"=>"Minh Hằng",
            "email"=>"minhhangg2509@gmail.com",
            "password"=>bcrypt('Minhhang2509'),
            "gender" => 0,
        ]);


        // User::updateOrCreate([
        //     "name"=>"Bùi Dũng",
        //     "email"=>"thedung.1292@gmail.com",
        //     "password"=>bcrypt('Buidung1292'),
        //     "role_id"=>1,
        //     "gender" => 1,
        // ]);

        // User::updateOrCreate([
        //     "name"=>"Minh Hằng",
        //     "email"=>"minhhangg2509@gmail.com",
        //     "password"=>bcrypt('Minhhang2509'),
        //     "role_id"=>1,
        //     "gender" => 0,
        // ]);

        dd('done');
    }

    public static function fixdate($date){
        return date('d-m-Y', strtotime($date));
    }

}
