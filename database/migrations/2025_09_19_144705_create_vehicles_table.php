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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('e.g., Bus-01, Van-A');
            $table->string('vehicle_type')->nullable(); // e.g., Bus, Van
            $table->string('make')->nullable(); // e.g., Tata, Force
            $table->string('model')->nullable();
            $table->string('registration_number')->unique();
            $table->integer('capacity')->unsigned();

            // Certificate & Tax Details
            $table->string('insurance_provider')->nullable();
            $table->string('policy_number')->nullable();
            $table->enum('insurance_coverage_type', ['first-party', 'third-party', 'comprehensive'])->nullable();
            $table->date('insurance_expiry_date')->nullable();
            $table->date('pollution_certificate_expiry_date')->nullable();
            $table->date('fitness_certificate_expiry_date')->nullable();
            $table->date('road_tax_paid_up_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
