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
            $table->string('code', 10); // BSN1
            $table->string('name'); // Bachelor of Science in Nursing
            $table->string('year_level', 20); // 1st Year, 2nd Year, etc.
            $table->timestamps();

            $table->unique(['code', 'year_level']);
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
