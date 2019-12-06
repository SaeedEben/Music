<?php

use App\Models\Music\Genre;
use App\Models\Music\Song;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('song_genre', function (Blueprint $table) {

            $table->bigInteger('song_id')->unsigned();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');

            $table->bigInteger('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
        Schema::dropIfExists('song_genre');
    }
}
