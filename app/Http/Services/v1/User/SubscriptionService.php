<?php

namespace App\Http\Services\v1\User;

use App\Http\Resources\v1\User\Subscription\SubscriptionBillCollection;
use App\Http\Resources\v1\User\Subscription\SubscriptionPlanCollection;
use App\Http\Resources\v1\User\Subscription\SubscriptionPlanResource;
use App\Http\Resources\v1\User\Subscription\SubscriptionResource;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Traits\ApiResponder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionService
{
    use ApiResponder;

    public function browsePlan()
    {
        $subscriptionPlan = SubscriptionPlan::where('status', 'active')->orderBy('price_cents', 'asc')->get();

        return $this->successResponse('Successfully retrieved subscription plan lists', new SubscriptionPlanCollection($subscriptionPlan));
    }

    public function showPlan($id)
    {
        $subscriptionPlan = SubscriptionPlan::find($id);

        return $this->successResponse('Successfully retrieved subscription details', new SubscriptionPlanResource($subscriptionPlan));
    }

    public function create($user, $planId)
    {
        $hasSubscription = $user->subscriptions()->where('status', Subscription::STATUS_ACTIVE)->first();

        if ($hasSubscription) {
            $hasSubscription->status = Subscription::STATUS_EXPIRED;
            $hasSubscription->earlier_end_at = now();
            $hasSubscription->save();
            DB::commit();
        }

        $subscriptionPlan = SubscriptionPlan::find($planId);

        DB::beginTransaction();
        try {
            $subscription = $user->subscriptions()->create([
                'subscription_plan_id' => $subscriptionPlan->id,
                'user_id' => $user->id,
                'start_at' => now()->format('Y-m-d 00:00:00'),
                'end_at' => Carbon::now()->addDay($subscriptionPlan->number_of_days)->format('Y-m-d 00:00:00'),
                'status' => Subscription::STATUS_ACTIVE,
                'subscription_plan_details' => [
                    'title' => $subscriptionPlan->title,
                    'description' => $subscriptionPlan->description,
                    'numberOfDays' => $subscriptionPlan->number_of_days,
                    'priceCents' => $subscriptionPlan->price_cents,
                ],

            ]);

            $user->subscriptionBiils()->create([
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
                'paid_amount_cents' => $subscriptionPlan->price_cents,
            ]);
            DB::commit();
            return $this->successResponseWithMessageOnly('Successfully purchased subscription plan');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorUnprocessableEntity($e->getMessage());
        }
    }

    public function show($id)
    {
        return $this->successResponse('Successfully retrieved subscription details', new SubscriptionResource(Subscription::find($id)));
    }

    public function showBills($user)
    {
        $subscriptionBills = $user->subscriptionBiils;

        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'postcode' => $user->postcode,
            'city' => $user->city,
            'state' => $user->state,
        ];

        $response = [
            'user' => $userData,
            'bills' => new SubscriptionBillCollection($subscriptionBills),
        ];

        return $this->successResponse('Successfully retrieved subscription bills', $response);
    }
}
