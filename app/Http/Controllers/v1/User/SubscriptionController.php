<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\v1\User\Subscription\SubscriptionPlanRequest;
use App\Http\Requests\v1\User\Subscription\SubscriptionRequest;
use App\Http\Services\v1\User\SubscriptionService;

class SubscriptionController extends ApiController
{
    public function browsPlan(SubscriptionService $subscriptionService)
    {
        return $subscriptionService->browsePlan();
    }

    public function showPlan(SubscriptionPlanRequest $request, SubscriptionService $subscriptionService)
    {
        return $subscriptionService->showPlan($request->id);
    }

    public function create(SubscriptionPlanRequest $request, SubscriptionService $subscriptionService)
    {
        return $subscriptionService->create($this->user(), $request->id);
    }

    public function show(SubscriptionRequest $request, SubscriptionService $subscriptionService)
    {
        return $subscriptionService->show($request->id, $this->user());
    }

    public function showBills(SubscriptionService $subscriptionService)
    {
        return $subscriptionService->showBills($this->user());
    }
}
