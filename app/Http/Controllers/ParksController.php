<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Park;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class ParksController extends Controller
{
    public function detail(Request $req, Park $park)
    {
        return view('parks.detail', [
            'park' => $park,
            'insect_photos' => Photo::where('photo_type', '昆虫')->orderBy('id', 'desc')->get(),
            'bird_photos' => Photo::where('photo_type', '鳥')->orderBy('id', 'desc')->get(),
            'plant_photos' => Photo::where('photo_type', '植物')->orderBy('id', 'desc')->get(),
        ]);
    }
    
    
    public function search(Request $req)
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

            $parks = $park_query->orderBy('id', 'DESC')->paginate(12);
        } else {
            $parks = collect([]);
        }
        return view('parks.search', [
            'parks' => $parks,

            'park_name' => $req->park_name,
            'address' => $req->address,
            'longitude' => $req->longitude,
            'latitude' => $req->latitude,

            'area' => $req->area,
            'is_basic_facility' => $req->is_basic_facility,
            'is_child' => $req->is_child,
            'is_nature' => $req->is_nature,
            'is_exercise' => $req->is_exercise,
            'is_outdoor' => $req->is_outdoor,
            'is_barrier_free' => $req->is_barrier_free,
            'is_others' => $req->is_others,
            
            'is_toilet' => $req->is_toilet,
            'is_management_room' => $req->is_management_room,
            'is_store' => $req->is_store,
            'is_parking' => $req->is_parking,

            'is_diaper' => $req->is_diaper,
            'is_playing_equipment' => $req->is_playing_equipment,
            'is_playing_with_sand' => $req->is_playing_with_sand,
            'is_playing_in_water' => $req->is_playing_in_water,

            'is_river' => $req->is_river,
            'is_flower_bed' => $req->is_flower_bed,
            'is_cherry_blossom' => $req->is_cherry_blossom,
            'is_promenade' => $req->is_promenade,

            'is_running' => $req->is_running,
            'is_baseball' => $req->is_baseball,
            'is_tennis' => $req->is_tennis,
            'is_gym' => $req->is_gym,
            'is_multipurpose_ground' => $req->is_multipurpose_ground,

            'is_accommodation' => $req->is_accommodation,
            'is_campground' => $req->is_campground,
            'is_kitchen' => $req->is_kitchen,
            'is_fishing' => $req->is_fishing,
            
            'is_multipurpose_toilet' => $req->is_multipurpose_toilet,
            'is_wheelchair_accessible' => $req->is_wheelchair_accessible,

            'is_dog_run' => $req->is_dog_run,
            'is_boat' => $req->is_boat,
            'is_art_museum' => $req->is_art_museum,
            'is_reference_library' => $req->is_reference_library,

            ]);
    }


    public function index(Request $req)
    {
        $park_query = Park::query();
        if ($req->latitude && $req->longitude) {
            $park_query->geofence($req->latitude, $req->longitude, 0, 10);
        }
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
        
        return view('parks.index', [
            'parks' => $park_query->orderBy('id', 'DESC')->paginate(12),

            'park_name' => $req->park_name,
            'address' => $req->address,
            'longitude' => $req->longitude,
            'latitude' => $req->latitude,
            
            'is_toilet' => $req->is_toilet,
            'is_management_room' => $req->is_management_room,
            'is_store' => $req->is_store,
            'is_parking' => $req->is_parking,

            'is_diaper' => $req->is_diaper,
            'is_playing_equipment' => $req->is_playing_equipment,
            'is_playing_with_sand' => $req->is_playing_with_sand,
            'is_playing_in_water' => $req->is_playing_in_water,

            'is_river' => $req->is_river,
            'is_flower_bed' => $req->is_flower_bed,
            'is_cherry_blossom' => $req->is_cherry_blossom,
            'is_promenade' => $req->is_promenade,

            'is_running' => $req->is_running,
            'is_baseball' => $req->is_baseball,
            'is_tennis' => $req->is_tennis,
            'is_gym' => $req->is_gym,
            'is_multipurpose_ground' => $req->is_multipurpose_ground,

            'is_accommodation' => $req->is_accommodation,
            'is_campground' => $req->is_campground,
            'is_kitchen' => $req->is_kitchen,
            'is_fishing' => $req->is_fishing,
            
            'is_multipurpose_toilet' => $req->is_multipurpose_toilet,
            'is_wheelchair_accessible' => $req->is_wheelchair_accessible,

            'is_dog_run' => $req->is_dog_run,
            'is_boat' => $req->is_boat,
            'is_art_museum' => $req->is_art_museum,
            'is_reference_library' => $req->is_reference_library,

            ]);
    }

    public function create()
    {
        return view('parks.create', [
        ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, array_merge(Park::$rules, Park::$rules_image));

        $file = $req->upfile;
        $file_name = basename($file->store('public'));
        $park = new Park();
        $park->fill(array_merge($req->all(), ['image_path' => $file_name]));
        $park->save();

        return redirect(route('parks.index'));
    }

    public function edit(Park $park)
    {
        return view('parks.edit', [
            'park' => $park
        ]);
    }

    public function update(Request $req, Park $park)
    {
        if ($req->delete_image) {
            $this->validate($req, array_merge(Park::$rules, Park::$rules_image));
            
            $file = $req->upfile;
            $file_name = basename($file->store('public'));
            Storage::disk('public')->delete($park->image_path);
            $park->image_path = $file_name;
        } else {
            $this->validate($req, Park::$rules);
        }
        
        $park->fill($req->all());
        $park->save();

        return redirect(route('parks.index'));
    }

    public function destroy(Park $park)
    {
        Storage::disk('public')->delete($park->image_path);
        $park->delete();

        return redirect(route('parks.index'));
    }
}
