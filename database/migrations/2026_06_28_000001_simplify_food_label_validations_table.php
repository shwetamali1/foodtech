<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('food_label_validations', function (Blueprint $table) {
            // Add new fields
            $table->string('business_category', 255)->nullable()->after('product_category');
            $table->string('lab_report_path', 500)->nullable()->after('caution_warning');
            $table->string('lab_report_original_name', 500)->nullable()->after('lab_report_path');

            // Remove fields no longer used
            $table->dropColumn([
                'brand_name',
                'sub_category',
                'country_of_origin',
                'vegetarian_type',
                'nutritional_info',
                'allergens',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('food_label_validations', function (Blueprint $table) {
            $table->dropColumn(['business_category', 'lab_report_path', 'lab_report_original_name']);

            $table->string('brand_name', 255)->nullable();
            $table->string('sub_category', 255)->nullable();
            $table->string('country_of_origin', 100)->nullable();
            $table->enum('vegetarian_type', ['vegetarian', 'non-vegetarian', 'vegan', 'egg'])->nullable();
            $table->json('nutritional_info')->nullable();
            $table->json('allergens')->nullable();
        });
    }
};
