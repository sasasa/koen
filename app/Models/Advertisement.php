<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Replyable;

class Advertisement extends Model
{
    use HasFactory, Replyable;

    public static $rules = [
        'representative_name' => 'required|min:2|max:30',
        'company_name' => 'required|min:2|max:30',
        'email' => 'required|email:strict,dns,spoof',
        'advertisement_body' => 'required|min:2|max:2000',
    ];

    protected $fillable = [
        'representative_name',
        'company_name',
        'email',
        'advertisement_body',
    ];
}
