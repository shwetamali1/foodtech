<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('offer', 30)->default('0');
            $table->text('description');
            $table->string('price', 50);
            $table->string('per', 50)->nullable();
            $table->string('discount', 10)->nullable();
            $table->string('credits', 100)->nullable();
            $table->json('features');
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
