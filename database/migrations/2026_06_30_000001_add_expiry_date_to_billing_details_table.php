<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('billing_details', function (Blueprint $table) {
            $table->date('expiry_date')->nullable()->after('subscription_start_date');
        });
    }

    public function down(): void
    {
        Schema::table('billing_details', function (Blueprint $table) {
            $table->dropColumn('expiry_date');
        });
    }
};
