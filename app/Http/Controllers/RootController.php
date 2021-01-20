<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class RootController extends Controller
{
    public function index()
    {
        return view('root.index', [
            'articles' => Article::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

    public function show(Article $article)
    {
        return view('root.show', [
            'article' => $article,
            'allowedTags' => '<h4><br><p>',
        ]);
    }

    public function list()
    {
        $park_articles = Article::where('article_type', Article::PARK)->get();
        $plant_articles = Article::where('article_type', Article::PLANT)->get();
        $animal_articles = Article::where('article_type', Article::ANIMAL)->get();

        return view('root.list', [
            'park_articles' => $park_articles,
            'plant_articles' => $plant_articles,
            'animal_articles' => $animal_articles,
        ]);
    }

    public function terms_of_use()
    {
        return view('root.terms_of_use');
    }

    public function about_advertising()
    {
        return view('root.about_advertising');
    }

    public function privacy_policy()
    {
        return view('root.privacy_policy');
    }
}
