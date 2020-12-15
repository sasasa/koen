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
            'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ],
    ];

    protected $fillable = [
        'park_name',
        'address',
        'image_path',
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
}
