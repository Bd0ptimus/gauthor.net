<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                "name"=>"Bùi Dũng",
                "email"=>"thedung.1292@gmail.com",
                "password"=>bcrypt('Buidung1292'),
                "dob"=>Carbon::parse('12-9-2000'),
                "quote"=>"Tui yêu bé thỏ",
                "role_id"=>Role::where('role_name',ROLE_TYPES[0])->first()->id,
                "nickname"=>"Chú Gấu",
                "gender"=>true
            ],
            [
                "name"=>"Minh Hằng",
                "email"=>"minhhangg2509@gmail.com",
                "password"=>bcrypt('Minhhang2509'),
                "dob"=>Carbon::parse('25-9-2000'),
                "quote"=>"LA LA LA",
                "role_id"=>Role::where('role_name',ROLE_TYPES[0])->first()->id,
                "nickname"=>"Bé Thỏ",
                "gender"=>false
            ],
        ];

        DB::beginTransaction();
        try{
            foreach($users as $user){
                User::updateOrCreate([
                    "name"=>$user['name'],
                    "email"=>$user['email'],
                    "password"=>$user['password'],
                    "dob"=>$user['dob'],
                    "quote"=>$user['quote'],
                    "role_id"=>$user['role_id'],
                    "nickname"=>$user['nickname'],
                    "gender"=>$user['gender'],
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            Log::debug('User Seeder Error : '. $e);
            DB::rollBack();
        }
    }
}
