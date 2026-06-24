<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('services', 500)->nullable();
            $table->string('slug', 200);
            $table->integer('service_type_id')->nullable();
            $table->string('price', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title', 60)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('uploaded_pdf', 500)->nullable();
            $table->string('uploaded_file', 500)->nullable();
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
