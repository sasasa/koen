<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Park;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class PhotosController extends Controller
{
    public function index(Request $req)
    {
        $photo_query = Photo::query();
        if ($req->park_id) {
            $photo_query->where('park_id', $req->park_id);
        }
        if ($req->photo_type) {
            $photo_query->where('photo_type', 'LIKE', '%'.$req->photo_type.'%');
        }
        if ($req->comment) {
            $photo_query->where('comment', 'LIKE', '%'.$req->comment.'%');
        }
        
        return view('photos.index', [
            'parks' => Park::optionFor(),
            'photos' => $photo_query->orderBy('id', 'DESC')->paginate(12),
            'comment' => $req->comment,
            'park_id' => $req->park_id,
            'photo_type' => $req->photo_type,
        ]);
    }

    public function store(Request $req, Park $park)
    {
        if ($req->has('insect_upfile') || $req->has('insect_comment')) {
            $this->validate($req, array_merge(Photo::getRules('insect_comment'), Park::getRulesImage('insect_upfile')));
            $req->merge(['upfile' => $req->insect_upfile]);
            $req->merge(['comment' => $req->insect_comment]);
        } else if ($req->has('bird_upfile') || $req->has('bird_comment')) {
            $this->validate($req, array_merge(Photo::getRules('bird_comment'), Park::getRulesImage('bird_upfile')));
            $req->merge(['upfile' => $req->bird_upfile]);
            $req->merge(['comment' => $req->bird_comment]);
        } else if ($req->has('plant_upfile') || $req->has('plant_comment')) {
            $this->validate($req, array_merge(Photo::getRules('plant_comment'), Park::getRulesImage('plant_upfile')));
            $req->merge(['upfile' => $req->plant_upfile]);
            $req->merge(['comment' => $req->plant_comment]);
        } else if ($req->has('facility_upfile') || $req->has('facility_comment')) {
            $this->validate($req, array_merge(Photo::getRules('facility_comment'), Park::getRulesImage('facility_upfile')));
            $req->merge(['upfile' => $req->facility_upfile]);
            $req->merge(['comment' => $req->facility_comment]);
        }
        


        $file = $req->upfile;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
        InterventionImage::make($file)->
        resize(1080, null, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(storage_path('app/public/'. $file_name));

        $photo = new Photo();
        $photo->fill(array_merge($req->all(), [
            'image_path' => $file_name,
            'comment' => mb_convert_kana($req->comment, 'Hcsa')
        ]))->save();

        $tag = Tag::updateOrCreate(
            ['tag' => mb_convert_kana($req->comment, 'Hcsa')],
            ['tag' => mb_convert_kana($req->comment, 'Hcsa')],
        );
        if (!$park->tags()->find($tag->id)) {
            $park->tags()->attach($tag->id);
        }

        return redirect()->back();
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', [
            'photo' => $photo,
        ]);
    }

    public function update(Request $req, Photo $photo)
    {
        if ($req->delete_image) {
            $this->validate($req, array_merge(Photo::$rules, Park::$rules_image));
            
            $file = $req->upfile;
            Storage::disk('public')->delete($photo->image_path);
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
            InterventionImage::make($file)->resize(1080, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(storage_path('app/public/'. $file_name));

            $photo->image_path = $file_name;
        } else {
            $this->validate($req, Photo::$rules);
        }
        
        $photo->fill($req->all());
        $photo->save();

        return redirect(route('photos.index'));
    }

    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();

        return redirect(route('photos.index'));
    }


    public function show(Request $req, Park $park, Photo $photo)
    {
        return view('photos.show', [
            'photo' => $photo,
            'park' => $park,
        ]);
    }
}
