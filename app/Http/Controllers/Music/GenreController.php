<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Music\Genre\StoreGenreRequest;
use App\Http\Resources\Music\Genre\GenreIndexResource;
use App\Http\Resources\Music\Genre\GenreShowResource;
use App\Models\Music\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|object
     */
    public function index()
    {
        $genre = Genre::paginate();
        return GenreIndexResource::collection($genre);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|array
     */
    public function store(StoreGenreRequest $request)
    {
        $genre = new Genre();
        $genre->fill($request->all());
//        $genre->songs()->attach(1);
        $genre->save();
        return [
            'success' => true,
            'message' => 'ژانر شما با موفقیت اضافه شد'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param Genre $genre
     *
     * @return \Illuminate\Http\Response|object
     */
    public function show(Genre $genre)
    {
        return new GenreShowResource($genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
