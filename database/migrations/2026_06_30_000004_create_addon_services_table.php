<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addon_services', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('price', 100);
            $table->integer('label_validation_credit')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_deleted')->default(0);
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addon_services');
    }
};
