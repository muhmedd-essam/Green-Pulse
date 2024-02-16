<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asks', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('ups')->default(0);
            $table->enum('who_will_answer', ['Engineering', 'Medicine', 'Computer Science', 'Mathematics', 'Psychology', 'Economics', 'Law', 'Chemistry', 'Business','Dentistry', 'Nursing',
            'Life Sciences', 'Public Health', 'Veterinary', 'Pharmacy', 'Clinical Medicine', 'Biotechnology', 'International Relations']);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asks');
    }
};
