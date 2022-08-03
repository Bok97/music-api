<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';

    protected $guarded = ['id'];

    protected $fillable = [
        'subscription_plan_id',
        'user_id',
        'start_at',
        'end_at',
        'status',
        'subscription_plan_details',
        'subscription_bill_id',
    ];

    protected $casts = [
        'subscription_plan_details' => 'array',
    ];

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
