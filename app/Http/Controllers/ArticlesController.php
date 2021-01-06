<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Park;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index', [
            'allowedTags' => '<h4><br><p>',
            'articles' => Article::orderBy('id', 'DESC')->paginate(12),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req, array_merge(Article::$rules, Park::$rules_image));

        $file = $req->upfile;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
        InterventionImage::make($file)->
        resize(1080, null, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(storage_path('app/public/'. $file_name));

        $article = new Article();
        $article->fill(array_merge($req->all(), ['image_path' => $file_name]))->save();
        
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Article $article)
    {
        if ($req->delete_image) {
            $this->validate($req, array_merge(Article::$rules, Park::$rules_image));
            $file = $req->upfile;
            Storage::disk('public')->delete($article->image_path);
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
            InterventionImage::make($file)->
            resize(1080, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(storage_path('app/public/'. $file_name));
            $article->image_path = $file_name;
        } else {
            $this->validate($req, Article::$rules);
        }
        
        $article->fill($req->all());
        $article->save();

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
