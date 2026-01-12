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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->string('section_code');
            $table->integer('capacity')->default(30);
            $table->string('semester'); // 1st Semester, 2nd Semester, Summer
            $table->string('school_year'); // 2024-2025
            $table->timestamps();

            $table->index('subject_id');
            $table->unique(['subject_id', 'section_code', 'semester', 'school_year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
