<?php

use App\Http\Controllers\v1\User\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::prefix('/playlists')->group(function () {
    Route::get('/', [PlaylistController::class, 'index'])->name('index');
    Route::get('/recommendation', [PlaylistController::class, 'recommendation'])->name('recommendation');
    Route::get('/{id}', [PlaylistController::class, 'show'])->name('show');
    Route::post('/', [PlaylistController::class, 'create'])->name('create');
    Route::post('/toggle/{genre_id}', [PlaylistController::class, 'toggle'])->name('toggle');
});
