<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    public static $rules = [
        'inquiry_name' => 'required|min:2|max:30',
        'inquiry_name_kana' => 'required|min:2|max:30',
        'email' => 'required|email:strict,dns,spoof',
        'inquiry_title' => 'required|min:2|max:30',
        'inquiry_body' => 'required|min:2|max:2000',
    ];

    protected $fillable = [
        'inquiry_name',
        'inquiry_name_kana',
        'email',
        'inquiry_title',
        'inquiry_body',
    ];
}
