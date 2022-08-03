<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained('albums')->nullable();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
