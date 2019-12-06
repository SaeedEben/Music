<?php

namespace App\Models\Music;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Song
 *
 * @package App\Models\Music
 *
 * @property int $id
 *
 * @property \DateTime $released_at
 * @property Carbon $length
 *
 * @property string $image_path
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Genre[] $genre
 * @property Category $category
 * @property int $category_id
 */

class Song extends Model
{
    protected $fillable = [
        'name',
        'released_at',
        'length',

    ];

    protected $casts =[
        'length' => 'date:hh:mm'
    ];

    // <<<<<<<<<<<<<<<<<<< Relations >>>>>>>>>>>>>>>>>>>>>>>

    public function genres()
    {
        return $this->belongsToMany(Genre::class , 'song_genre', 'song_id', 'genre_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
