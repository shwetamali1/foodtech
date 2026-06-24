<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name', 150)->nullable();
            $table->string('permission_id', 1500)->nullable();
            $table->string('module_permission_id', 1500)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->dateTime('created_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
