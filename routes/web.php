<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ------------------- Home ------------------------


Route::get('/', function () {
    return view('welcome');
});


// ------------------- Login & Logout ------------------------

Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');
});
Route::group(['namespace' => 'Frontend'] , function (){
    Route::get('artist/{id}' , 'ArtistController@show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ------------------- Panel/music/Routes ------------------------

Route::group(['namespace' => 'Panel'], function () {
    Route::group(['namespace' => 'Music', 'prefix' => 'music', 'middleware' => 'auth'], function () {


        Route::get('/album/create' , function (){
            return view('music.album.create-album');
        });
        Route::get('/updateal/{album}' , 'AlbumController@edit');
        Route::get('/album/list', 'AlbumController@list');
        Route::post('/album/restore', 'AlbumController@restore');
        Route::apiResource('/album', 'AlbumController');

        Route::get('/genre/create' , function (){
            return view('music.genre.create-genre');
        });
        Route::get('/update/{genre}' , 'GenreController@edit');
        Route::get('/genre/list', 'GenreController@list');
        Route::post('/genre/restore', 'GenreController@restore');
        Route::apiResource('/genre', 'GenreController');

        Route::get('/category/create' , function (){
            return view('music.category.create-category');
        });
        Route::get('/updatecat/{category}' , 'CategoryController@edit');
        Route::get('/category/list', 'CategoryController@list');
        Route::post('/category/restore', 'CategoryController@restore');
        Route::apiResource('/category', 'CategoryController');

        Route::get('/artist/create' , function (){
            return view('music.artist.create-artist');
        });
        Route::get('/updateart/{artist}' , 'ArtistController@edit');
        Route::get('/artist/list', 'ArtistController@list');
        Route::post('/artist/restore', 'ArtistController@restore');
        Route::apiResource('/artist', 'ArtistController');

        Route::get('/song/create' , 'SongController@create');
        Route::get('/updatesong/{song}' , 'SongController@edit');
        Route::get('/song/list', 'SongController@list');
        Route::post('/song/restore', 'SongController@restore');
        Route::apiResource('/song', 'SongController');
    });
});



