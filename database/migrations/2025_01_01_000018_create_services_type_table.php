<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 100)->nullable();
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services_type');
    }
};
