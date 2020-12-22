<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Park;
use Illuminate\Support\Facades\Storage;
use \InterventionImage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, Park $park)
    {
        $this->validate($req, array_merge(Photo::$rules, Park::$rules_image));

        $file = $req->upfile;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
        InterventionImage::make($file)->resize(1080, null, function($constraint) {$constraint->aspectRatio();})->save(storage_path('app/public/'.$file_name));

        $photo = new Photo();
        $photo->fill(array_merge($req->all(), ['image_path' => $file_name]))->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('photos.edit', [
            'photo' => $photo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Photo $photo)
    {
        if ($req->delete_image) {
            $this->validate($req, array_merge(Photo::$rules, Park::$rules_image));
            
            $file = $req->upfile;
            Storage::disk('public')->delete($photo->image_path);
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            //アスペクト比を維持、画像サイズを横幅1080pxにして保存する。
            InterventionImage::make($file)->resize(1080, null, function($constraint) {$constraint->aspectRatio();})->save(storage_path('app/public/'.$file_name));

            $photo->image_path = $file_name;
        } else {
            $this->validate($req, Photo::$rules);
        }
        
        $photo->fill($req->all());
        $photo->save();

        return redirect(route('photos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();

        return redirect(route('photos.index'));
    }


    public function show(Request $req, Park $park, Photo $photo)
    {
        view('photos.show', [
            'photo' => $photo,
            'park' => $park,
        ]);
    }
}