<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Park;
use App\Models\Article;
use App\Models\Photo;
use App\Models\Tag;

class SiteMapController extends Controller
{
    public function sitemap()
    {
        $sitemap = \App::make("sitemap");
        $now = Carbon::now();

        $articles = Article::orderBy('id', 'DESC')->limit(4)->get();
        $images = [];
        foreach ($articles as $article) {
            $images[] = [
                'url' => \URL::to('/storage/'. $article->image_path),
                'title' => $article->title,
                'caption' => $article->title,
                'geo_location' => '',
            ];
        }
        $sitemap->add(\URL::to('/'), $now, '1.0', 'weekly', $images);
        // \URL::to('/home')はweb.phpでトップページに指定したURL　＋ α　をaddメソッドで指定している

        $sitemap->add(\URL::to('/search_feature'), $now, '0.9', 'weekly');
        $sitemap->add(\URL::to('/search_map'), $now, '0.9', 'weekly');
        $sitemap->add(\URL::to('/search_by_location'), $now, '0.9', 'weekly');


        $photos = Photo::whereNotIn('photo_type', ['ダミー'])->
                            orderBy('id', 'DESC')->limit(100)->get();
        $images = [];
        foreach ($photos as $photo) {
            $images[] = [
                'url' => \URL::to('/storage/'. $photo->image_path),
                'title' => $photo->comment,
                'caption' => $photo->photo_type,
                'geo_location' => $photo->park->address,
            ];
        }
        $sitemap->add(\URL::to('/search_by_plant_and_animal'), $now, '0.8', 'weekly', $images);
        foreach (['昆虫', '鳥類', '植物'] as $type) {
            $sitemap->add(\URL::to('/search_by_plant_and_animal/'. $type), $now, '0.8', 'weekly', $images);

            $group_photos = Photo::where('photo_type', $type)->orderBy('id', 'desc')->get()->groupBy('comment');
            foreach ($group_photos as $tag => $photos) {
                $sitemap->add(\URL::to('/search_by_plant_and_animal/'. $type. '?photo='. $tag), $now, '0.9', 'weekly', $images);
            }
        }


        $parks = Park::orderBy('created_at', 'DESC')->get();
        foreach ($parks as $park) {
            
            // add item with images
            $images = [];
            $images[] = [
                'url' => \URL::to('/storage/'. $park->image_path),
                'title' => $park->park_name,
                'caption' => $park->park_type,
                'geo_location' => $park->address,
            ];

            foreach ($park->photos as $photo) {
                $images[] = [
                    'url' => \URL::to('/storage/'. $photo->image_path),
                    'title' => $photo->comment,
                    'caption' => $photo->photo_type,
                    'geo_location' => $park->address,
                ];
            }
            $sitemap->add(\URL::to('/detail/'. $park->id), $now, '1.0', 'weekly', $images);
            $sitemap->add(\URL::to('/user_edit/'. $park->id), $now, '0.8', 'weekly');
        }

        $articles = Article::orderBy('created_at', 'DESC')->get();
        $all_images = [];
        foreach ($articles as $article) {
            $images = [];
            $ary = [
                'url' => \URL::to('/storage/'. $article->image_path),
                'title' => $article->title,
                'caption' => $article->title,
                'geo_location' => '',
            ];
            $images[] = $ary;
            $all_images[] = $ary;
            $sitemap->add(\URL::to('/article/'. $article->id), $now, '0.9', 'weekly', $images);
        }
        $sitemap->add(\URL::to('/article'), $now, '0.9', 'weekly', $all_images);
        
    
        // generate your sitemap (format, filename)
        // $sitemap->store('xml', 'sitemap');
        return $sitemap->render('xml');
    }
}
