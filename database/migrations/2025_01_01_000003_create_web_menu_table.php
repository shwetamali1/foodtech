<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('web_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->nullable();
            $table->string('url', 200)->nullable();
            $table->string('controller', 255)->nullable();
            $table->string('action', 255)->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('orders')->nullable();
            $table->text('nav_item');
            $table->string('menu_icon', 100)->nullable();
            $table->string('permission_tag', 100)->nullable();
            $table->enum('is_submenu', ['No', 'Yes']);
            $table->tinyInteger('status')->default(1);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('web_menu');
    }
};
