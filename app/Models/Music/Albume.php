<?php

namespace App\Models\Music;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Albume
 *
 * @package App\Models\Music
 *
 * @property int $id
 *
 * @property string $name
 * @property Carbon $released_at
 * @property int $number_of_track
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Albume extends Model
{
    protected $fillable = ['name' , 'release_at' , 'number_of_track'];

    // <<<<<<<<<<<<<<<<<<< Relations >>>>>>>>>>>>>>>>>>>>>>>

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

}
