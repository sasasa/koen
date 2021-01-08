<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Park;
use App\Models\Article;

class SiteMapController extends Controller
{
    public function sitemap()
    {
        $sitemap = \App::make("sitemap");
        $now = Carbon::now();
        // add items to the sitemap (url, date, priority, freq)

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
        $sitemap->add(\URL::to('/search_by_plant_and_animal'), $now, '0.9', 'weekly');

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
        }

        $articles = Article::orderBy('created_at', 'DESC')->get();
        foreach ($articles as $article) {
            $images = [];
            $images[] = [
                'url' => \URL::to('/storage/'. $article->image_path),
                'title' => $article->title,
                'caption' => $article->title,
                'geo_location' => '',
            ];
            $sitemap->add(\URL::to('/article/'. $article->id), $now, '0.9', 'weekly', $images);
        }

        
    
        // generate your sitemap (format, filename)
        // $sitemap->store('xml', 'sitemap');
        return $sitemap->render('xml');
    }
}
