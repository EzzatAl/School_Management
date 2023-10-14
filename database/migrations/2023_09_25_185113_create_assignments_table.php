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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('grade_id')->constrained('grades');
            $table->string('name');
            $table->date('date')->default(now()->toDateString());
            $table->string('description');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
