<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public static $rules = [
        'tag' => 'required|min:1|max:20|hiragana',
    ];

    protected $fillable = [
        'tag',
    ];

    public function parks()
    {
        return $this->belongsToMany('App\Models\Park');
    }
}
