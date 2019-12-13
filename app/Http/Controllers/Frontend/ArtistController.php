<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repository\Music\MysqlArtistRepository;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function show($id)
    {
        $artist = Artist::paginate();
//
//            return ArtistIndexResource::collection($artist);
//        });

//        if (cache()->has('artists')){
//            return cache()->pull('artists');
//        }
//        $artist = Artist::paginate();
//
//        cache()->put('artists', $artist , now()->addSeconds(2));
//
//        return ArtistIndexResource::collection($artist);


        return resolve('App\Repository\Music\MysqlArtistRepository')
            ->getartist($id);
    }
}
