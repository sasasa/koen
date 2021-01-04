<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Park;

class SearchParksController extends Controller
{
    public function search_by_location(Request $req)
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


    public function search_from_map(Request $req)
    {
        $park_query = Park::query();
        if ($req->park_name) {
            $park_query->where('park_name', 'LIKE', '%'.$req->park_name.'%');
        }
        if ($req->address) {
            $park_query->where('address', 'LIKE', '%'.$req->address.'%');
        }
        if ($req->is_toilet) {
            $park_query->where('is_toilet', $req->is_toilet);
        }
        if ($req->is_management_room) {
            $park_query->where('is_management_room', $req->is_management_room);
        }
        if ($req->is_store) {
            $park_query->where('is_store', $req->is_store);
        }
        if ($req->is_parking) {
            $park_query->where('is_parking', $req->is_parking);
        }
        if ($req->is_diaper) {
            $park_query->where('is_diaper', $req->is_diaper);
        }
        if ($req->is_playing_equipment) {
            $park_query->where('is_playing_equipment', $req->is_playing_equipment);
        }
        if ($req->is_playing_with_sand) {
            $park_query->where('is_playing_with_sand', $req->is_playing_with_sand);
        }
        if ($req->is_playing_in_water) {
            $park_query->where('is_playing_in_water', $req->is_playing_in_water);
        }
        if ($req->is_river) {
            $park_query->where('is_river', $req->is_river);
        }
        if ($req->is_flower_bed) {
            $park_query->where('is_flower_bed', $req->is_flower_bed);
        }
        if ($req->is_cherry_blossom) {
            $park_query->where('is_cherry_blossom', $req->is_cherry_blossom);
        }
        if ($req->is_promenade) {
            $park_query->where('is_promenade', $req->is_promenade);
        }
        if ($req->is_running) {
            $park_query->where('is_running', $req->is_running);
        }
        if ($req->is_baseball) {
            $park_query->where('is_baseball', $req->is_baseball);
        }
        if ($req->is_tennis) {
            $park_query->where('is_tennis', $req->is_tennis);
        }
        if ($req->is_gym) {
            $park_query->where('is_gym', $req->is_gym);
        }
        if ($req->is_multipurpose_ground) {
            $park_query->where('is_multipurpose_ground', $req->is_multipurpose_ground);
        }
        if ($req->is_accommodation) {
            $park_query->where('is_accommodation', $req->is_accommodation);
        }
        if ($req->is_campground) {
            $park_query->where('is_campground', $req->is_campground);
        }
        if ($req->is_kitchen) {
            $park_query->where('is_kitchen', $req->is_kitchen);
        }
        if ($req->is_fishing) {
            $park_query->where('is_fishing', $req->is_fishing);
        }
        if ($req->is_multipurpose_toilet) {
            $park_query->where('is_multipurpose_toilet', $req->is_multipurpose_toilet);
        }
        if ($req->is_wheelchair_accessible) {
            $park_query->where('is_wheelchair_accessible', $req->is_wheelchair_accessible);
        }
        if ($req->is_dog_run) {
            $park_query->where('is_dog_run', $req->is_dog_run);
        }
        if ($req->is_boat) {
            $park_query->where('is_boat', $req->is_boat);
        }
        if ($req->is_art_museum) {
            $park_query->where('is_art_museum', $req->is_art_museum);
        }
        if ($req->is_reference_library) {
            $park_query->where('is_reference_library', $req->is_reference_library);
        }
        if ($req->area) {
            // areaを使った検索
            $park_query->where('address', 'LIKE', '%'.$req->area.'%');
            if($req->area == '福岡市') {
                $lat = 33.60639;
                $lng = 130.41806;
                $zoom = 12;
            }
            $parks = $park_query->orderBy('id', 'DESC')->get()->each(function($park){
                $park->map = '<strong class="map-pin"><a href="'.route('parks.detail', ['park'=>$park]) .'">'. $park->park_name. '</a></strong>';
            });
        }
        return [
            'parks' =>  $parks,
            'mapOptions' => [
                'center' => [
                    'lat' => $lat,
                    'lng' => $lng,
                ],
                'zoom' => $zoom,
            ],
        ];
    }
}
