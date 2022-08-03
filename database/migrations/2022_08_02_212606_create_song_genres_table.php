<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongGenresTable extends Migration
{
    public function up()
    {
        Schema::create('song_genres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->constrained('genres');
            $table->foreignId('song_id')->constrained('songs');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('song_genres');
    }
}
