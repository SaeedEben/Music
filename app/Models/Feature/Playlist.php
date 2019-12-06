<?php

namespace App\Models\Feature;

use App\Models\Music\Song;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;


class Playlist extends Model
{
    protected $fillable = ['name'];

    // <<<<<<<<<<<<<<<<<<< Relations >>>>>>>>>>>>>>>>>>>>>>>

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
