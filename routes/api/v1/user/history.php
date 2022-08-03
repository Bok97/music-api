<?php

use App\Http\Controllers\v1\User\HistoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/histories')->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('index');
    Route::post('/{song_id}', [HistoryController::class, 'create'])->name('create');
});
