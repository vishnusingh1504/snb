<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // each teacher is linked to one user
            $table->string('teacher_id')->unique();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('specialization')->nullable();
            $table->string('mobile_no')->nullable();
            $table->text('address')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('status')->default('active');
            $table->string('image_location')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamp('last_modified_on')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

