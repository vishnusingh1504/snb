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

            // Custom student ID (e.g., SNB10001)
            $table->string('student_id')->unique();

            // Personal Details
            $table->string('name');
            $table->string('name_hindi')->nullable();
            $table->string('adhar_no', 12);
            $table->string('pen_number', 10);
            $table->enum('gender', ['male', 'female', 'others']);
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('transport_route')->nullable();

            // Parent Details
            $table->string('father_name')->nullable();
            $table->string('father_name_hindi')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_name_hindi')->nullable();
            $table->string('father_adhar', 12)->nullable();
            $table->string('mother_adhar', 12)->nullable();
            $table->string('father_mobile', 10)->nullable();
            $table->string('mother_mobile', 10)->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();

            // Academic Details
            $table->integer('admission_session');
            $table->integer('admission_class');
            $table->date('admission_date');
            $table->string('active_session');

            $table->string('stream', 55)->nullable();

            $table->string('religion', 55)->nullable();
            $table->string('category', 45)->nullable();
            $table->string('caste', 60)->nullable();

            // Address stored as JSON
            $table->json('address')->nullable();

            // Bank Details
            $table->string('bank_account_number');
            $table->string('ifsc_code', 11);

            // Previous School/Academic Details
            $table->json('previous_academic_details')->nullable();

            // Photos
            $table->json('images')->nullable();

            $table->enum('status', ['Active', 'Transffered', 'Passed Out', 'Inactive'])->default('Active');
            $table->string('last_updated_by')->nullable();
            $table->string('created_by')->nullable();

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
