<?php

namespace App\Http\Controllers\Panel\Music;

use App\Http\Controllers\Controller;
use App\Http\Resources\Music\Song\SongIndexResource;
use App\Http\Resources\Music\Song\SongShowResource;
use App\Models\Music\Song;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $song = Song::paginate();

        return SongIndexResource::collection($song);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return array
     */
    public function store(Request $request)
    {
        $song         = new Song();
        $translations = [
            'en' => $request->name['en'],
            'fa' => $request->name['fa'],
        ];
        $song->setTranslations('name', $translations);

        $song->fill($request->all());
        $song->category_id = $request->category_id;
        $song->album_id    = $request->album_id;
        $song->save();

        return [
            'success' => true,
            'message' => trans('responses.panel.music.message.store'),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param Song $song
     *
     * @return SongShowResource
     */
    public function show(Song $song)
    {
        return new SongShowResource($song);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Song    $song
     *
     * @return array
     */
    public function update(Request $request, Song $song)
    {
        $translation = [
            'fa' => $request->name['fa'],
            'en' => $request->name['en'],
        ];
        $song->setTranslations('name', $translation);
        $song->fill($request->all());
        $song->save();

        return [
            'success' => true,
            'message' => trans('responses.panel.music.message.update'),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Song $song
     *
     * @return array
     * @throws \Exception
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return [
            'success' => true,
            'message' => trans('responses.panel.music.message.delete'),
        ];
    }
}
