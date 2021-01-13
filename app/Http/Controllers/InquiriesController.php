<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        
        $inquiry_query = Inquiry::query();
        if ($req->inquiry_name) {
            $inquiry_query->where('inquiry_name', 'LIKE', '%'.$req->inquiry_name.'%');
        }
        if ($req->inquiry_name_kana) {
            $inquiry_query->where('inquiry_name_kana', 'LIKE', '%'.$req->inquiry_name_kana.'%');
        }
        if ($req->email) {
            $inquiry_query->where('email', 'LIKE', '%'.$req->email.'%');
        }
        if ($req->inquiry_title) {
            $inquiry_query->where('inquiry_title', 'LIKE', '%'.$req->inquiry_title.'%');
        }
        if ($req->inquiry_body) {
            $inquiry_query->where('inquiry_body', 'LIKE', '%'.$req->inquiry_body.'%');
        }

        return view('inquiries.index', [
            'inquiries' => $inquiry_query->orderBy('id', 'DESC')->paginate(12),
            'inquiry_name' => $req->inquiry_name,
            'inquiry_name_kana' => $req->inquiry_name_kana,
            'email' => $req->email,
            'inquiry_title' => $req->inquiry_title,
            'inquiry_body' => $req->inquiry_body,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inquiries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req, Inquiry::$rules);

        $inquiry = new Inquiry();
        $inquiry->fill($req->all())->save();

        return redirect(route('inquiries.done', ['inquiry' => $inquiry]));
    }

    public function done()
    {
        return view('inquiries.done');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Inquiry $inquiry)
    {
        $inquiry->is_reply = !$inquiry->is_reply;
        $inquiry->save();
        return redirect(route('inquiries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        
        return redirect(route('inquiries.index'));
    }
}
