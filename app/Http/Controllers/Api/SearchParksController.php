<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Park;

class SearchParksController extends Controller
{
    public function index(Request $req)
    {
        $latitude = $req->latitude; //33.587596999999995;
        $longitude = $req->longitude; //130.4006734;
        $parks = Park::geofence($latitude, $longitude, 0, 2)->get()->each(function($park){
            $park->map = '<strong class="map-pin"><a href="'.route('parks.detail', ['park'=>$park]) .'">'. $park->park_name. '</a></strong>';
        });
        return [
            'parks' => $parks
        ];
    }
}
