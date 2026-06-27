<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('food_label_validations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Step 1 – Product Details
            $table->string('product_name', 255);
            $table->string('product_category', 255);
            $table->string('brand_name', 255)->nullable();
            $table->string('sub_category', 255)->nullable();
            $table->string('fssai_license_no', 100);
            $table->string('net_quantity', 100);
            $table->string('country_of_origin', 100);
            $table->enum('vegetarian_type', ['vegetarian', 'non-vegetarian', 'vegan', 'egg']);
            $table->text('manufacturer_name_address');

            // Steps 2 & 3 – Nutritional Information (JSON with values + units)
            $table->json('nutritional_info')->nullable();

            // Step 4 – Ingredients
            $table->text('ingredients')->nullable();
            $table->text('additives_ins_no')->nullable();

            // Step 5a – Allergens (JSON array of selected allergen names)
            $table->json('allergens')->nullable();

            // Step 5b – Other Declarations
            $table->string('storage_conditions', 255)->nullable();
            $table->text('instructions_for_use')->nullable();
            $table->text('caution_warning')->nullable();

            // Status & Admin Response
            $table->enum('status', ['submitted', 'under_review', 'completed'])->default('submitted');
            $table->text('admin_comments')->nullable();
            $table->string('final_label_path', 500)->nullable();
            $table->string('final_label_original_name', 500)->nullable();

            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('food_label_validations');
    }
};
