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
        Schema::create('quiz_question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_question_id')->nullable()->constrained('quiz_questions');
            $table->string('Answer');
            $table->boolean('IsRightAnswer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_question_answers');
    }
};
