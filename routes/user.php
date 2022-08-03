<?php

use App\Http\Controllers\v1\User\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/private/v1/users')->group(function () {
    require __DIR__ . '/api/v1/user/auth.php';

    Route::group(['middleware' => ['auth:user', 'scopes:user']], function () {
        require __DIR__ . '/api/v1/user/profile.php';

        require __DIR__ . '/api/v1/user/playlist.php';

        require __DIR__ . '/api/v1/user/history.php';

        require __DIR__ . '/api/v1/user/liked_song.php';

        require __DIR__ . '/api/v1/user/subscription.php';

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
