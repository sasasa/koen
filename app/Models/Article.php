<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    const PARK = 1;
    const PLANT = 2;
    const ANIMAL = 3;

    public static $rules = [
        'title' => 'required|min:6|max:60',
        'body' => 'required|min:10|max:2000',
        'article_type' => 'required|in:'.self::PARK.','.self::PLANT.','.self::ANIMAL,
    ];

    public static $types = [
        0 => '選択してください',
        self::PARK => '公園',
        self::PLANT => '植物',
        self::ANIMAL => '動物',
    ];

    protected $fillable = [
        'title',
        'body',
        'image_path',
        'article_type',
    ];
}
