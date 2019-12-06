<?php

namespace App\Models\Music;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artist
 *
 * @package App\Models\Music
 *
 * @property int $id
 *
 * @property string $name
 * @property string $biography
 *
 * @property Song[] $song
 *
 */

class Artist extends Model
{
    protected $fillable = ['name' , 'biography'];

    // <<<<<<<<<<<<<<<<<<< Relations >>>>>>>>>>>>>>>>>>>>>>>

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }

    public function files()
    {
        return $this->morphMany(File::class , 'fileable');
    }
}
