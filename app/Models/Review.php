<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // 男性
    const MALE = 1;
    // 女性
    const FEMALE = 2;
    // その他
    const OTHER = 3;

    const UNDER_10 = 0;
    const TEENAGER = 1;
    const TWENTIES = 2;
    const THIRTIES = 3;
    const FORTIES = 4;
    const FIFTIES = 5;
    const SIXTIES = 6;
    const SEVENTIES = 7;
    const EIGHTIES = 8;

    /**
     * @var array
     */
    public static $genders = [
        self::MALE => '男性',
        self::FEMALE => '女性',
        self::OTHER => 'その他',
    ];

    /**
     * @var array
     */
    public static $ages = [
        ''             => '選択してください',
        self::UNDER_10 => '10歳以下',
        self::TEENAGER => '10歳代',
        self::TWENTIES => '20歳代',
        self::THIRTIES => '30歳代',
        self::FORTIES => '40歳代',
        self::FIFTIES => '50歳代',
        self::SIXTIES => '60歳代',
        self::SEVENTIES => '70歳代',
        self::EIGHTIES => '80歳代',
    ];

    public static $rules = [
        'title' => 'required|min:3|max:60',
        'body' => 'required|min:10|max:200',
        'gender' => 'required',
        'age' => 'required',
    ];

    protected $fillable = [
        'title',
        'body',
        'gender',
        'age',
        'park_id'
    ];

    /**
     * @return string
     */
    public function getGenderJpAttribute(): string
    {
        return self::$genders[$this->gender];
    }
    /**
     * @return string
     */
    public function getAgeJpAttribute(): string
    {
        return self::$ages[$this->age];
    }

    public function park(): object
    {
        return $this->belongsTo('App\Models\Park');
    }
}
