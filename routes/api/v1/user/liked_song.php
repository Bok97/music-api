<?php

use App\Http\Controllers\v1\User\LikedSongController;
use Illuminate\Support\Facades\Route;

Route::prefix('/liked_songs')->group(function () {
    Route::get('/', [LikedSongController::class, 'index'])->name('index');
    Route::post('/{song_id}', [LikedSongController::class, 'toggle'])->name('toggle');
});
