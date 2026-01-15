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
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->string('academic_year');
            $table->enum('semester', ['1st Semester', '2nd Semester', 'Summer']);
            $table->text('schedule')->nullable();
            $table->enum('status', ['pending', 'grades_submitted', 'completed'])->default('pending');
            $table->timestamps();
            
            // Ensure a faculty can't have duplicate loads for the same subject and section in the same semester
            $table->unique(['faculty_id', 'subject_id', 'section_id', 'academic_year', 'semester'], 'unique_load_assignment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loads');
    }
};
