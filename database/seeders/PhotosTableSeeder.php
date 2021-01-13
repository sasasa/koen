<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( Storage::disk('public')->exists('noimage.png') ) {
            
        } else {
            throw new \Exception('storage/app/public 内に noimage.png が存在しないので Seeding を終了する');
        }
        
        if( env('APP_ENV', 'production') === 'local' ) {
            Photo::create([
                'photo_type' => 'ダミー',
                'image_path' => 'noimage.png',
                'comment' => '',
                'park_id' => 0,
            ]);
        } else {
            Photo::create([
                'photo_type' => 'ダミー',
                'image_path' => 'noimage.png',
                'comment' => '',
                'park_id' => 0,
            ]);
        }
    }
}
