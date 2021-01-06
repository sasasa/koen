<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class RootController extends Controller
{
    public function index()
    {
        return view('index', [
            'articles' => Article::orderBy('id', 'DESC')->limit(4)->get(),
        ]);
    }

    public function show(Article $article)
    {
        return view('show', [
            'article' => $article,
            'allowedTags' => '<h4><br><p>',
        ]);
    }
}
