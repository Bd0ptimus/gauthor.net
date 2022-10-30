<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Role;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            "admin",
            "normal_user",
        ];

        DB::beginTransaction();
        try{
            foreach($roles as $role){
                Role::updateOrCreate([
                    "role_name"=>$role,
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            Log::debug('RolesSeeder Error : '. $e);
            DB::rollBack();
        }
    }
}
