<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('student_id')->unique();
            $table->string('pen_number');
            $table->string('adhar_no');
            $table->date('dob');
            $table->string('caste');
            $table->string('religion');
            $table->string('admission_class');
            $table->date('admission_date');
            $table->string('stream'); // Home Science, Maths, Bio
            $table->string('current_class');
            $table->string('prev_school');
            $table->string('mobile_no');
            $table->string('father_name');
            $table->string('father_adhar');
            $table->string('father_occu');
            $table->string('father_mobile');
            $table->string('mother_name');
            $table->string('mother_adhar');
            $table->string('mother_occu');
            $table->string('mother_mobile');
            $table->text('address');
            $table->string('admission_session');
            $table->string('current_session');
            $table->string('image_location')->nullable();
            $table->enum('status', ['Active', 'Transffered']);
            $table->string('last_updated_by')->nullable();
            $table->timestamp('last_modified_on')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamp('created_on')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
