<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'title' => '野球も出来るとってもいい公園',
            'body' => '最大213文字入力できるので切り良く２００文字でお願いします。
            少年野球チームの試合をこの公園で行いました。球場がいくつもあり、設備がかなり充実していました。どうもシャワールームなどもあるようで汗をかいても大丈夫な公園です。などなど。とコメントが見られます。',
            'age' => '1',
            'gender' => '1',
            'park_id' => '1',
        ]);
    }
}
