<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( env('APP_ENV', 'production') === 'local' ) {
            for($i=0; $i<4; $i++) {
                if (!Storage::disk('public')->exists('article3.png')) {
                    if ( Storage::disk('public')->exists('article.png') ) {
                        Storage::disk('public')->copy('article.png', 'article'. $i. '.png');
                    } else {
                        throw new \Exception('storage/app/public 内に article.png が存在しないので Seeding を終了する');
                    }
                }
                Article::create([
                    'image_path' => 'article'. $i. '.png',
                    'title' => '公園種別って？その'. $i,
                    'body' => '<h4>小見出し</h4>
                    <p>公園には実は規模によって種別が変わります、公園には実は規模によって種別が変わります。公園には実は規模によって種別が変わります、公園には実は規模によって種別が変わります。公園には実は規模によって種別が変わります、公園には実は規模によって種別が変わります。</p>
                    <h4>小見出し</h4>
                    <p>公園には実は規模によって種別が変わります、公園には実は規模によって種別が変わります。公園には実は規模によって種別が変わります、公園には実は規模によって種別が変わります。公園には実は規模によって種別が変わります、公園には実は規模によって種別が変わります。</p>',
                ]);
            }
        }
    }
}
