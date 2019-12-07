<?php

namespace App\Models\Music;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


/**
 * Class Artist
 *
 * @package App\Models\Music
 *
 * @property int    $id
 *
 * @property string $name
 * @property string $biography
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Song[] $song
 *
 */
class Artist extends Model
{

    protected $fillable = ['name', 'biography'];

    // <<<<<<<<<<<<<<<<<<< use translation trait >>>>>>>>>>>>>>>>>>>>>>>

    use HasTranslations;

    public $translatable = ['name'];

    // <<<<<<<<<<<<<<<<<<< Relations >>>>>>>>>>>>>>>>>>>>>>>

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
