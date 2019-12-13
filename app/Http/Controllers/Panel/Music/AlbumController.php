<?php

namespace App\Http\Controllers\Panel\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Music\Album\StoreAlbumRequest;
use App\Http\Requests\Music\Album\UpdateAlbumRequest;
use App\Http\Resources\Music\Album\AlbumIndexResource;
use App\Http\Resources\Music\Album\AlbumShowResource;
use App\Models\Music\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Response;use test\Mockery\MagicParams;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response |object
     */
    public function index()
    {
        $pure_data = Album::paginate();
        $obj = AlbumIndexResource::collection($pure_data)->resource;
        $albums = json_decode(json_encode($obj))->data;
        return view('music/album/albumindex' , compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlbumRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     */
    public function store(StoreAlbumRequest $request)
    {
        \DB::beginTransaction();
        try {
            $album = new Album();

            $translations = [
                'fa' => $request->name['fa'],
                'en' => $request->name['en'],
            ];

            $album->setTranslations('name', $translations);
            $album->fill($request->all());
            $album->save();

            \DB::commit();

            return redirect('music/album');

        }catch(\Exception $exception){
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
     * @param Album $album
     *
     * @return Response|object
     */
    public function show(Album $album)
    {
        $album = new AlbumShowResource($album);
        return view('music.album.showalbum' , compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlbumRequest $request
     * @param Album              $album
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        \DB::beginTransaction();
        try {
            $translations = [
                'fa' => $request->name['fa'],
                'en' => $request->name['en'],
            ];

            $album->setTranslations('name', $translations);
            $album->fill($request->all());
            $album->save();

            \DB::commit();

            return redirect('music/album');
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
     * @param Album $album
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     * @throws \Exception
     */
    public function destroy(Album $album)
    {
        try {
            $album->delete();

            return redirect('music/album');
        }catch (\Exception $exception){
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     */
    public function restore(Request $request)
    {

        try {
            Album::onlyTrashed()->findOrFail($request->id)->restore();

            return redirect('music/album/list');

        }catch (\Exception $exception){

            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(){
        $pure_data = Album::paginate();
        $obj = AlbumIndexResource::collection($pure_data)->resource;
        $albums = json_decode(json_encode($obj))->data;
        return view('music.album.albumlist', compact('albums'));
    }

    public function edit(Album $album)
    {
        return view('music.album.update-album' , compact('album'));
    }

}
