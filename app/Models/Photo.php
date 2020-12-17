<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public static $rules = [
        'comment' => 'required|max:60',
        'photo_type' => 'required|max:60',
    ];

    protected $fillable = [
        'comment',
        'park_id',
        'image_path',
        'photo_type',
    ];

    public function park(): object
    {
        return $this->belongsTo('App\Models\Park');
    }
}
