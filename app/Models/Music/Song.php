<?php

namespace App\Models\Music;

use App\Models\Feature\Favorite;
use App\Models\Feature\History;
use App\Models\Feature\Playlist;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Song
 *
 * @package App\Models\Music
 *
 * @property int       $id
 *
 * @property \DateTime $released_at
 * @property Carbon    $length
 * @property string    $lyric
 *
 * @property string    $image_path
 *
 * @property Carbon    $created_at
 * @property Carbon    $updated_at
 *
 * @property Genre[]   $genre
 * @property Category  $category
 * @property int       $category_id
 */
class Song extends Model
{
    protected $fillable = [
        'name',
        'release_at',
        'duration',

    ];

    protected $casts = [
        'duration' => 'date:hh:mm',
    ];

    // <<<<<<<<<<<<<<<<<<< Relations >>>>>>>>>>>>>>>>>>>>>>>

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'song_genre', 'song_id', 'genre_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function video()
    {
        return $this->hasOne(Video::class);
    }

    public function albume()
    {
        return $this->belongsTo(Albume::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    // <<<<<<<<<<<<<<<<<<< PolyMorph Relations >>>>>>>>>>>>>>>>>>>>>>>


    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
