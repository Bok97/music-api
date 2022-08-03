<?php

use App\Http\Controllers\v1\User\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/subscriptions')->group(function () {
    Route::get('/plans', [SubscriptionController::class, 'browsPlan'])->name('subscriptionPlanList');
    Route::get('/plans/{id}', [SubscriptionController::class, 'showPlan'])->name('subscriptionPlanDetails');
    Route::post('/plans/{id}', [SubscriptionController::class, 'create'])->name('create');
    Route::get('/bills', [SubscriptionController::class, 'showBills'])->name('showBills');
    Route::get('/{id}', [SubscriptionController::class, 'show'])->name('show');
});
