<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('liecenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('subscription_id')->nullable();
            $table->string('license_number', 200)->nullable();
            $table->enum('status', ['active', 'expired', 'pending'])->default('pending');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('liecenses');
    }
};
