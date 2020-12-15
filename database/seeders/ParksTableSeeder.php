<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Park;
use Illuminate\Support\Facades\Storage;

class ParksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<100; $i++) {
            if (!Storage::disk('public')->exists('koen99.jpg')) 
            {
                if ( Storage::disk('public')->exists('koen.jpg') ) {
                    Storage::disk('public')->copy('koen.jpg', 'koen'. $i. '.jpg');
                } else {
                    throw new \Exception('storage/app/public内にkoen.jpgが存在しないのでSeedingを終了する');
                }
            }


            Park::create([
                'park_name' => '福岡第'. $i . "公園",
                'address' => '福岡市城南区友丘5-14-7',
                'image_path' => 'koen'. $i. '.jpg',
                'longitude' => 130.41800 + 0.00006*$i,
                'latitude' => 33.60630 + 0.00009*$i,
                'is_toilet' => false,
                'is_management_room' => false,
                'is_store' => false,
                'is_parking' => false,
                'is_diaper' => false,
                'is_playing_equipment' => false,
                'is_playing_with_sand' => false,
                'is_playing_in_water' => false,
                'is_river' => false,
                'is_flower_bed' => false,
                'is_cherry_blossom' => false,
                'is_promenade' => false,
                'is_running' => false,
                'is_baseball' => false,
                'is_tennis' => false,
                'is_gym' => false,
                'is_multipurpose_ground' => false,
                'is_accommodation' => false,
                'is_campground' => false,
                'is_kitchen' => false,
                'is_fishing' => false,
                'is_multipurpose_toilet' => false,
                'is_wheelchair_accessible' => false,
                'is_dog_run' => false,
                'is_boat' => false,
                'is_art_museum' => false,
                'is_reference_library' => false,
            ]);
        }
    }
}
