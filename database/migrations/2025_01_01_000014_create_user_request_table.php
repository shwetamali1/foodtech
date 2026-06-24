<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->integer('service_id');
            $table->integer('user_id');
            $table->string('adhar_number', 50);
            $table->string('start_date', 10)->nullable();
            $table->string('start_month', 10)->nullable();
            $table->string('start_year', 10)->nullable();
            $table->string('end_date', 10)->nullable();
            $table->string('end_month', 10)->nullable();
            $table->string('end_year', 10)->nullable();
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_request');
    }
};
