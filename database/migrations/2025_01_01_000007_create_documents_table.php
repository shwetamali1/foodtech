<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document', 500)->nullable();
            $table->string('slug', 200)->nullable();
            $table->integer('type_id')->nullable();
            $table->text('description')->nullable();
            $table->string('uploaded_file', 500)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
