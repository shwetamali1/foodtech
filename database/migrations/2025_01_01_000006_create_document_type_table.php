<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 100)->nullable();
            $table->string('description', 300)->nullable();
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_type');
    }
};
