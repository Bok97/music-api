<?php

use App\Http\Controllers\v1\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
});
