<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Music\Category\StoreCategoryRequest;
use App\Http\Resources\Music\Artist\ArtistIndexResource;
use App\Http\Resources\Music\Artist\ArtistShowResource;
use App\Models\Music\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|object
     */
    public function index()
    {
        $artist = Artist::paginate();
        return ArtistIndexResource::collection($artist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|array
     */
    public function store(StoreCategoryRequest $request)
    {
        $artist = new Artist();
        $artist->fill($request->all());
        $artist->save();

        return [
            'success' => true,
            'message' => 'اطلاعات هنرمند جدید ذخیره شد.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param Artist $artist
     *
     * @return void|object
     */
    public function show(Artist $artist)
    {
        return new ArtistShowResource($artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Artist                   $artist
     *
     * @return \Illuminate\Http\Response|array
     */
    public function update(Request $request, Artist $artist)
    {
        $artist->fill($request->all());
        $artist->save();

        return [


            'success' => true,
            'message' => 'اطلاعات هنرمند به روزرسانی شد',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Artist $artist
     *
     * @return void|array
     * @throws \Exception
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return [
            'success'=> true,
            'message' => 'اطلاعات هنرمند با موفقیت حذف شد'
        ];
    }
}
