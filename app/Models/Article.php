<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public static $rules = [
        'title' => 'required|min:6|max:60',
        'body' => 'required|min:10|max:2000',
    ];

    protected $fillable = [
        'title',
        'body',
        'image_path'
    ];
}
