<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementsController extends Controller
{
    public function done()
    {
        return view('advertisements.done');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $advertisement_query = Advertisement::query();

        if ($req->company_name) {
            $advertisement_query->where('company_name', 'LIKE', '%'.$req->company_name.'%');
        }
        if ($req->representative_name) {
            $advertisement_query->where('representative_name', 'LIKE', '%'.$req->representative_name.'%');
        }
        if ($req->email) {
            $advertisement_query->where('email', 'LIKE', '%'.$req->email.'%');
        }
        if ($req->advertisement_body) {
            $advertisement_query->where('advertisement_body', 'LIKE', '%'.$req->advertisement_body.'%');
        }
        if ($req->is_reply) {
            if ($req->is_reply == 1) {
                $advertisement_query->where('is_reply', false);
            } else if ($req->is_reply == 2) {
                $advertisement_query->where('is_reply', true);
            }
        }

        return view('advertisements.index', [
            'advertisements' => $advertisement_query->orderBy('id', 'DESC')->paginate(12),
            'company_name' => $req->company_name,
            'representative_name' => $req->representative_name,
            'email' => $req->email,
            'advertisement_body' => $req->advertisement_body,
            'is_reply' =>  $req->is_reply,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req, Advertisement::$rules);

        $advertisement = new Advertisement();
        $advertisement->fill($req->all())->save();

        return redirect(route('advertisements.done', ['advertisement' => $advertisement]));
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
    public function update(Request $req, Advertisement $advertisement)
    {
        $advertisement->is_reply = !$advertisement->is_reply;
        $advertisement->save();
        return redirect(route('advertisements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        
        return redirect(route('advertisements.index'));
    }
}
