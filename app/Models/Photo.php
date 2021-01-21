<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Photo extends Model
{
    use HasFactory;

    public static $rules = [
        'comment' => 'required|min:1|max:20|hiragana',
        'photo_type' => 'required|min:1|max:10',
    ];

    public static function getRules(string $comment) {
        return [
            $comment => 'required|min:1|max:20|hiragana',
            'photo_type' => 'required|min:1|max:10',
        ];
    }

    public static $optionsForSelect = [
        ''=>'選択してください',
        '昆虫'=>'昆虫',
        '鳥'=>'鳥',
        '植物'=>'植物',
        '施設' => '施設',
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

    public static function alwaysSixInRow(Collection $collection): Collection
    {
        $count = $collection->count();
        if($count <= 7) {
            $num = 7 - $count;
            $dummy = self::where('photo_type', 'ダミー')->get();
            for($i=0; $i<$num; $i++) {
                $collection = $collection->concat($dummy);
            }
        }
        return $collection;
    }
}
