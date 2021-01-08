<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    public static $rules = [
        'inquiry_name' => 'required|min:6|max:60',
        'inquiry_name_kana' => 'required|min:10|max:2000',
        'email' => '',
        'inquiry_title' => '',
        'inquiry_body' => '',
    ];

    protected $fillable = [
        'inquiry_name',
        'inquiry_name_kana',
        'email',
        'inquiry_title',
        'inquiry_body',
    ];
}
