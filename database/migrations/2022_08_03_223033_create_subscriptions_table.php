<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_plan_id')->constrained('subscription_plans');
            $table->foreignId('user_id')->constrained('users');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->enum('status', ['active', 'expired']);
            $table->json('subscription_plan_details');
            $table->dateTime('earlier_end_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
