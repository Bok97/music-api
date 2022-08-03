<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedSongsTable extends Migration
{
    public function up()
    {
        Schema::create('liked_songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('song_id')->constrained('songs');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('liked_songs');
    }
}
