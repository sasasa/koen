<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Park;

class ReviewsController extends Controller
{
    public function index(Request $req)
    {
        $review_query = Review::query();
        if ($req->park_id) {
            $review_query->where('park_id', $req->park_id);
        }
        if ($req->title) {
            $review_query->where('title', 'LIKE', '%'.$req->title.'%');
        }
        if ($req->body) {
            $review_query->where('body', 'LIKE', '%'.$req->body.'%');
        }
        return view('reviews.index', [
            'parks' => Park::optionFor(),
            'reviews' => $review_query->orderBy('id', 'DESC')->paginate(12),
            'body' => $req->body,
            'title' => $req->title,
            'park_id' => $req->park_id,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $req, Park $park)
    {
        $this->validate($req, Review::$rules);

        $review = new Review();
        $review->fill($req->all())->save();
        session()->flash('message','口コミ投稿完了');

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', [
            'review' => $review
        ]);
    }


    public function update(Request $req, Review $review)
    {
        $this->validate($req, Review::$rules);
        $review->fill($req->all())->save();

        return redirect(route('reviews.index'));
    }


    public function destroy(Review $review)
    {
        $review->delete();
        
        return redirect(route('reviews.index'));
    }
}
