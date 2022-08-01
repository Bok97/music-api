<?php

use App\Http\Controllers\v1\User\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/check_email', [AuthController::class, 'checkEmail'])->name('checkEmail');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/forgot_password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/reset_password', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('/resend_verification_code', [AuthController::class, 'resendVerificationCode'])->name('resendVerificationCode');

Route::group(['middleware' => ['auth:user', 'scopes:user']], function () {
    Route::post('/email_verification', [AuthController::class, 'emailVerificationCode'])->name('emailVerificationCode');
});
