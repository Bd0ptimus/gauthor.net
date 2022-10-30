<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ImageType;

class ImagetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageTypes = [
            "slug"=>[
                "avatar",
                "personal_image",
                "couple_image",
            ],
        ];

        DB::beginTransaction();
        try{
            foreach($imageTypes['slug'] as $imageTypeSlug){
                ImageType::updateOrCreate([
                    "slug"=>$imageTypeSlug,
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            Log::debug('Image seeder Error: '.$e);
            DB::rollBack();
        }
    }
}
