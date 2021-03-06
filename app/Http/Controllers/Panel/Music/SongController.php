<?php

namespace App\Http\Controllers\Panel\Music;

use App\Http\Controllers\Controller;
use App\Http\Resources\Music\Song\SongIndexResource;
use App\Http\Resources\Music\Song\SongShowResource;
use App\Models\Music\Category;use App\Models\Music\Genre;use App\Models\Music\Song;
use Illuminate\Contracts\View\Factory;use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;use Illuminate\View\View;

/**
* Class SongController
 *
 * @package App\Http\Controllers\Panel\music
 * @mixin Song
 */
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $pure_data = Song::paginate();
        $obj = SongIndexResource::collection($pure_data)->resource;
        $songs = json_decode(json_encode($obj))->data;
        return view('music/song/songindex' , compact('songs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        \DB::beginTransaction();

        try {
            $song         = new Song();
            $translations = [
                'en' => $request->name['en'],
                'fa' => $request->name['fa'],
            ];
            $song->setTranslations('name', $translations);
            $esm = $request->file('songname')->getClientOriginalName();
            $storage = storage_path("app/public/music/{$esm}");
            $request->file('songname')->move('storage/musics' , $esm);

            $song->music_path = $storage;
            $song->fill($request->all());
            $catid = explode('.' , $request->category);
            $song->category_id = $catid[0];
            $song->album_id    = 1;
            $song->save();
            $genid = explode('.' , $request->genre);
            $song->genres()->attach($genid[0]);
            \DB::commit();
            return redirect('music/song');
        }catch (\Exception $exception){
            \DB::rollBack();

            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
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
        \DB::beginTransaction();

        try {
            $translation = [
                'fa' => $request->name['fa'],
                'en' => $request->name['en'],
            ];
            $song->setTranslations('name', $translation);
            $song->fill($request->all());
            $song->save();

            \DB::commit();
            return [
                'success' => true,
                'message' => trans('responses.panel.music.message.update'),
            ];
        }catch (\Exception $exception){
            \DB::rollBack();

            return [
              'success' => false,
              'message' => $exception->getMessage(),
            ];
        }
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
        try {
            $song->delete();

            return [
                'success' => true,
                'message' => trans('responses.panel.music.message.delete'),
            ];
        }catch (\Exception $exception){

            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $id
     *
     * @return array
     * @throws \Exception
     */
    public function restore($id)
    {
        try {
            Song::onlyTrashed()->findOrFail($id)->restore();

            return [
                'success' => true,
                'message' => trans('responses.panel.music.message.restore'),
            ];
        }catch (\Exception $exception){

            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    /**
     * Transform the resource into an array.
     *
     *
     * @return Factory|View
     */
    public function list()
    {
        $pure_data = Song::paginate();
        $obj = SongIndexResource::collection($pure_data)->resource;
        $songs = json_decode(json_encode($obj))->data;
        return view('music.song.songlist', compact('songs'));
    }

    public function create()
    {
        $category = Category::all();
        $genre = Genre::all();
        return view('music.song.create-song' , compact('genre', 'category'));
    }
}
