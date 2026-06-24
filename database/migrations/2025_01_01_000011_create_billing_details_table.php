<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('billing_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 200);
            $table->string('last_name', 200);
            $table->string('email', 100);
            $table->string('mobile', 20);
            $table->string('country', 50);
            $table->string('payment_method', 50);
            $table->string('card_number', 20)->nullable();
            $table->string('date', 5)->nullable();
            $table->string('month', 5)->nullable();
            $table->string('year', 5)->nullable();
            $table->string('country_code', 5)->default('+91');
            $table->integer('user_id');
            $table->string('payment_plan', 100)->nullable();
            $table->integer('subscribe_id');
            $table->enum('payment_status', ['pending', 'success', 'rejected'])->default('pending');
            $table->string('transaction_id', 200)->nullable();
            $table->longText('json_response')->nullable();
            $table->dateTime('subscription_start_date')->nullable();
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billing_details');
    }
};
