<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class Park extends Model
{
    use HasFactory, Geographical;

    protected static $kilometers = true;

    public static $rules = [
        'park_name' => 'required|max:60',
        'address' => 'required|max:128',
        'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
    ];

    public static $rules_image = [
        'upfile' => [
            'required',
            'file',
            'image',
            'mimes:jpeg,png',
            'dimensions:min_width=100,min_height=100,max_width=4000,max_height=4000',
        ],
    ];

    protected $fillable = [
        'park_name',
        'address',
        'image_path',
        
        'park_type',
        'surface_area',
        'management',
        'url',
        'map',

        'longitude',
        'latitude',
        'is_toilet',
        'is_management_room',
        'is_store',
        'is_parking',
        'is_diaper',
        'is_playing_equipment',
        'is_playing_with_sand',
        'is_playing_in_water',
        'is_river',
        'is_flower_bed',
        'is_cherry_blossom',
        'is_promenade',
        'is_running',
        'is_baseball',
        'is_tennis',
        'is_gym',
        'is_multipurpose_ground',
        'is_accommodation',
        'is_campground',
        'is_kitchen',
        'is_fishing',
        'is_multipurpose_toilet',
        'is_wheelchair_accessible',
        'is_dog_run',
        'is_boat',
        'is_art_museum',
        'is_reference_library',
    ];

    public function photos(): object
    {
        return $this->hasMany('App\Models\Photo');
    }

    public function getName(string $name): string
    {
        return __('validation.attributes.'. $name);
    }

    public function getBasicFacilityNames(): array
    {
        $ret = [];
        if($this->is_toilet) {
            $ret[] = $this->getName('is_toilet');
        }
        if($this->is_management_room) {
            $ret[] = $this->getName('is_management_room');
        }
        if($this->is_store) {
            $ret[] = $this->getName('is_store');
        }
        if($this->is_parking) {
            $ret[] = $this->getName('is_parking');
        }
        return $ret;
    }
    public function getChildNames(): array
    {
        $ret = [];
        if($this->is_diaper) {
            $ret[] = $this->getName('is_diaper');
        }
        if($this->is_playing_equipment) {
            $ret[] = $this->getName('is_playing_equipment');
        }
        if($this->is_playing_with_sand) {
            $ret[] = $this->getName('is_playing_with_sand');
        }
        if($this->is_playing_in_water) {
            $ret[] = $this->getName('is_playing_in_water');
        }
        return $ret;
    }
    public function getNatureNames(): array
    {
        $ret = [];
        if($this->is_river) {
            $ret[] = $this->getName('is_river');
        }
        if($this->is_flower_bed) {
            $ret[] = $this->getName('is_flower_bed');
        }
        if($this->is_cherry_blossom) {
            $ret[] = $this->getName('is_cherry_blossom');
        }
        if($this->is_promenade) {
            $ret[] = $this->getName('is_promenade');
        }
        return $ret;
    }
    public function getExerciseNames(): array
    {
        $ret = [];
        if($this->is_running) {
            $ret[] = $this->getName('is_running');
        }
        if($this->is_baseball) {
            $ret[] = $this->getName('is_baseball');
        }
        if($this->is_tennis) {
            $ret[] = $this->getName('is_tennis');
        }
        if($this->is_gym) {
            $ret[] = $this->getName('is_gym');
        }
        if($this->is_multipurpose_ground) {
            $ret[] = $this->getName('is_multipurpose_ground');
        }
        return $ret;
    }
    public function getOutdoorNames(): array
    {
        $ret = [];
        if($this->is_accommodation) {
            $ret[] = $this->getName('is_accommodation');
        }
        if($this->is_campground) {
            $ret[] = $this->getName('is_campground');
        }
        if($this->is_kitchen) {
            $ret[] = $this->getName('is_kitchen');
        }
        if($this->is_fishing) {
            $ret[] = $this->getName('is_fishing');
        }
        return $ret;
    }
    public function getBarrierFreeNames(): array
    {
        $ret = [];
        if($this->is_multipurpose_toilet) {
            $ret[] = $this->getName('is_multipurpose_toilet');
        }
        if($this->is_wheelchair_accessible) {
            $ret[] = $this->getName('is_wheelchair_accessible');
        }
        return $ret;
    }
    public function getOthersNames(): array
    {
        $ret = [];
        if($this->is_dog_run) {
            $ret[] = $this->getName('is_dog_run');
        }
        if($this->is_boat) {
            $ret[] = $this->getName('is_boat');
        }
        if($this->is_art_museum) {
            $ret[] = $this->getName('is_art_museum');
        }
        if($this->is_reference_library) {
            $ret[] = $this->getName('is_reference_library');
        }
        return $ret;
    }


    public function getNames(): array
    {
        $ret = [];
        if($this->is_toilet) {
            $ret[] = $this->getName('is_toilet');
        }
        if($this->is_management_room) {
            $ret[] = $this->getName('is_management_room');
        }
        if($this->is_store) {
            $ret[] = $this->getName('is_store');
        }
        if($this->is_parking) {
            $ret[] = $this->getName('is_parking');
        }
        if($this->is_diaper) {
            $ret[] = $this->getName('is_diaper');
        }
        if($this->is_playing_equipment) {
            $ret[] = $this->getName('is_playing_equipment');
        }
        if($this->is_playing_with_sand) {
            $ret[] = $this->getName('is_playing_with_sand');
        }
        if($this->is_playing_in_water) {
            $ret[] = $this->getName('is_playing_in_water');
        }
        if($this->is_river) {
            $ret[] = $this->getName('is_river');
        }
        if($this->is_flower_bed) {
            $ret[] = $this->getName('is_flower_bed');
        }
        if($this->is_cherry_blossom) {
            $ret[] = $this->getName('is_cherry_blossom');
        }
        if($this->is_promenade) {
            $ret[] = $this->getName('is_promenade');
        }
        if($this->is_running) {
            $ret[] = $this->getName('is_running');
        }
        if($this->is_baseball) {
            $ret[] = $this->getName('is_baseball');
        }
        if($this->is_tennis) {
            $ret[] = $this->getName('is_tennis');
        }
        if($this->is_gym) {
            $ret[] = $this->getName('is_gym');
        }
        if($this->is_multipurpose_ground) {
            $ret[] = $this->getName('is_multipurpose_ground');
        }
        if($this->is_accommodation) {
            $ret[] = $this->getName('is_accommodation');
        }
        if($this->is_campground) {
            $ret[] = $this->getName('is_campground');
        }
        if($this->is_kitchen) {
            $ret[] = $this->getName('is_kitchen');
        }
        if($this->is_fishing) {
            $ret[] = $this->getName('is_fishing');
        }
        if($this->is_multipurpose_toilet) {
            $ret[] = $this->getName('is_multipurpose_toilet');
        }
        if($this->is_wheelchair_accessible) {
            $ret[] = $this->getName('is_wheelchair_accessible');
        }
        if($this->is_dog_run) {
            $ret[] = $this->getName('is_dog_run');
        }
        if($this->is_boat) {
            $ret[] = $this->getName('is_boat');
        }
        if($this->is_art_museum) {
            $ret[] = $this->getName('is_art_museum');
        }
        if($this->is_reference_library) {
            $ret[] = $this->getName('is_reference_library');
        }
        return $ret;
    }

    public static function optionFor()
    {
        $parks = [''=>'選択してください'];
        self::orderBy('id', 'DESC')->get()->each(function($park) use(&$parks) {
            $parks[$park->id] = $park->park_name;
        });
        return $parks;
    }
}
