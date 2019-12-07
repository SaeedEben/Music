<?php

namespace App\Http\Controllers\Panel\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Music\Album\StoreAlbumRequest;
use App\Http\Requests\Music\Album\UpdateAlbumRequest;
use App\Http\Resources\Music\Album\AlbumIndexResource;
use App\Http\Resources\Music\Album\AlbumShowResource;
use App\Models\Music\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response |object
     */
    public function index()
    {
        $album = Album::paginate();

        return AlbumIndexResource::collection($album);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlbumRequest $request
     *
     * @return Response|array
     */
    public function store(StoreAlbumRequest $request)
    {
        $album = new Album();

        $translations = [
            'fa' => $request->name['fa'],
            'en' => $request->name['en'],
        ];

        $album->setTranslations('name', $translations);
        $album->fill($request->all());
        $album->save();

        return [
            'success' => true,
            'message' => trans('responses.panel.music.message.store'),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     *
     * @return Response|object
     */
    public function show(Album $album)
    {
        return new AlbumShowResource($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlbumRequest $request
     * @param Album              $album
     *
     * @return array
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $translations = [
            'fa' => $request->name['fa'],
            'en' => $request->name['en'],
        ];

        $album->setTranslations('name', $translations);
        $album->fill($request->all());
        $album->save();

        return [
            'success' => true,
            'message' => trans('responses.panel.music.message.update'),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     *
     * @return Response|array
     * @throws \Exception
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return [
            'success' => true,
            'message' => trans('responses.panel.music.message.delete'),
        ];
    }
}
