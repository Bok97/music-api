<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'description',
        'number_of_days',
        'price_cents',
        'status',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'subscription_plan_id');
    }
}
