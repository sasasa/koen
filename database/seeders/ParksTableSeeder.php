<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Park;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class ParksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( env('APP_ENV', 'production') === 'local' ) {
            Artisan::call('park:csv:loader');
        } else {
            Artisan::call('park:csv:loader');
        }
        // for($i=0; $i<100; $i++) {
        //     if (!Storage::disk('public')->exists('koen99.png'))
        //     {
        //         if ( Storage::disk('public')->exists('koen.png') ) {
        //             Storage::disk('public')->copy('koen.png', 'koen'. $i. '.png');
        //         } else {
        //             throw new \Exception('storage/app/public内にkoen.pngが存在しないのでSeedingを終了する');
        //         }
        //     }
            // Park::create([
            //     'park_name' => '福岡第'. $i . "公園",
            //     'address' => '福岡市城南区友丘5-14-7',
            //     'image_path' => 'koen'. $i. '.jpg',

            //     'park_type' => '運動公園',
            //     'surface_area' => 1000,
            //     'management' => '福岡市',
            //     'url' => 'http://localhost/',
            //     'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1661.8029784447729!2d130.34373415822694!3d33.58957884518356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3541930896668a2b%3A0x23382a0614339737!2z44CSODE0LTAwMDEg56aP5bKh55yM56aP5bKh5biC5pep6Imv5Yy655m-6YGT5rWc77yU5LiB55uu77yU!5e0!3m2!1sja!2sjp!4v1608097947850!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',

            //     'longitude' => 130.41800 + 0.00006*$i,
            //     'latitude' => 33.60630 + 0.00009*$i,
            //     'is_toilet' => false,
            //     'is_management_room' => false,
            //     'is_store' => false,
            //     'is_parking' => false,
            //     'is_diaper' => false,
            //     'is_playing_equipment' => false,
            //     'is_playing_with_sand' => false,
            //     'is_playing_in_water' => false,
            //     'is_river' => false,
            //     'is_flower_bed' => false,
            //     'is_cherry_blossom' => false,
            //     'is_promenade' => false,
            //     'is_running' => false,
            //     'is_baseball' => false,
            //     'is_tennis' => false,
            //     'is_gym' => false,
            //     'is_multipurpose_ground' => false,
            //     'is_accommodation' => false,
            //     'is_campground' => false,
            //     'is_kitchen' => false,
            //     'is_fishing' => false,
            //     'is_multipurpose_toilet' => false,
            //     'is_wheelchair_accessible' => false,
            //     'is_dog_run' => false,
            //     'is_boat' => false,
            //     'is_art_museum' => false,
            //     'is_reference_library' => false,
            // ]);
        // }
    }
}
