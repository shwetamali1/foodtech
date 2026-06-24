<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reports_title', 500)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('uploaded_video', 500)->nullable();
            // PDFs stored in private storage (storage/app/reports), served via authenticated controller
            $table->string('uploaded_pdf', 500)->nullable();
            $table->string('price', 100)->nullable();
            $table->text('description')->nullable();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
