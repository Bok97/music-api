<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionBillsTable extends Migration
{
    public function up()
    {
        Schema::create('subscription_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('subscription_id')->constrained('subscriptions');
            $table->integer('paid_amount_cents');
            $table->enum('method', ['FPX'])->default('FPX');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscription_bills');
    }
}
