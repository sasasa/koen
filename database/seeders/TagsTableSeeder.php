<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Park;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'tag' => 'からす',
        ]);
        Tag::create([
            'tag' => 'すずめ',
        ]);
        Tag::create([
            'tag' => 'はと',
        ]);

        Tag::create([
            'tag' => 'もんしろちょう',
        ]);
        Tag::create([
            'tag' => 'せみ',
        ]);
        Tag::create([
            'tag' => 'かえる',
        ]);

        Tag::create([
            'tag' => 'さくら',
        ]);
        Tag::create([
            'tag' => 'ちゅーりっぷ',
        ]);
        Tag::create([
            'tag' => 'まつ',
        ]);
        $tags = Tag::get();

        Park::get()->each(function($park) use($tags) {
            $sync = [];
            for($i=0; $i<3; $i++) {
                $sync[] = $tags->random()->id;
            }
            // $park->tags()->sync(array_unique($sync));
            $park->tags()->sync($sync);
        });
    }
}
