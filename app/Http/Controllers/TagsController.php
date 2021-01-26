<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Park;
use App\Models\Photo;

class TagsController extends Controller
{
    public function index(Request $req)
    {
        $tag_query = Tag::query();
        if ($req->tag) {
            $tag_query->where('tag', $req->tag);
        }
        return view('tags.index', [
            'tags' => $tag_query->orderBy('id', 'DESC')->paginate(12),
            'tag' => $req->tag,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(Request $req, Tag $tag)
    {
        $this->validate($req, Tag::$rules);
        $tmp_tag = $tag->tag;
        $tag->fill($req->all())->save();
        Photo::where('comment', $tmp_tag)->each(function ($photo) use($req) {
            $photo->comment = $req->tag;
            $photo->save();
        });


        return redirect(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        if($tag->parks->isEmpty()) {
            $tag->delete();
        } else {
            session()->flash('message', $tag->tag. 'に紐づけてあるデータが存在するため削除できません。');
        }
        return redirect(route('tags.index'));
    }
}
