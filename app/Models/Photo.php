<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Photo extends Model
{
    use HasFactory;

    public static $rules = [
        'comment' => 'required|max:20',
        'photo_type' => 'required|max:10',
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
        if($count < 7) {
            $num = 6 - $count;
            $dummy = self::where('photo_type', 'ダミー')->get();
            for($i=0; $i<$num; $i++) {
                $collection = $collection->concat($dummy);
            }
        }
        return $collection;
    }
}
