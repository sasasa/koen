<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create([
            'photo_type' => 'ダミー',
            'image_path' => 'noimage.png',
            'comment' => '',
            'park_id' => 0,
        ]);
    }
}
