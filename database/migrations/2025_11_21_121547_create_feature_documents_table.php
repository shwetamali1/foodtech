<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feature_documents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subscription_id')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();     // user against whom feature is
            $table->unsignedBigInteger('uploaded_by')->nullable()->index(); // admin id
            $table->string('feature_signature', 64)->index();
            $table->text('feature_text');
            $table->string('original_name');
            $table->string('file_path');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feature_documents');
    }
};
