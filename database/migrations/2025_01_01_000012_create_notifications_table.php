<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('notification')->nullable();
            $table->integer('sent_by')->nullable();
            $table->integer('send_to');
            // 'unread' = not yet seen by recipient; 'read' = acknowledged via mark-as-read
            $table->enum('status', ['unread', 'read'])->default('unread');
            $table->dateTime('sent_date')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
