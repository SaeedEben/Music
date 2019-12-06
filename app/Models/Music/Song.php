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
        'release_at',
        'duration',

    ];

    protected $casts =[
        'duration' => 'date:hh:mm'
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

    public function video()
    {
        return $this->hasOne(Video::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function albume()
    {
        return $this->belongsTo(Albume::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class , 'likable');
    }
}
