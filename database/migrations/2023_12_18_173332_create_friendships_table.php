<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
                {
                    Schema::create('friendships', function (Blueprint $table) {
                        $table->id();
                        $table->unsignedBigInteger('user_id');
                        $table->unsignedBigInteger('friend_user_id');
                        $table->enum('status', ['pending', 'accepted'])->default('pending');
                        $table->timestamps();

                        $table->foreign('user_id')->references('id')->on('users');
                        $table->foreign('friend_user_id')->references('id')->on('users');

                        // استخدام unique في Blueprint وليس في Schema
                        $table->unique(['user_id', 'friend_user_id']);
                    });
                }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendships');
    }
};
