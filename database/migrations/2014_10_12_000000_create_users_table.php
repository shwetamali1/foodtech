<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('user_name', 100)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->integer('category_id')->default(1);
            $table->string('mobile', 20)->nullable();
            $table->string('email', 255)->unique();
            $table->string('employee_code', 50)->nullable();
            $table->string('password', 255);
            $table->string('google_id', 500)->nullable();
            // 1 = Super Admin, 6 = Admin, 8 = Regular User
            $table->integer('user_role_id')->default(8);
            $table->string('company_name', 255)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->string('remember_token', 500)->nullable();
            $table->enum('is_deleted', ['0', '1'])->default('0');
            $table->string('forgot_token', 200)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
