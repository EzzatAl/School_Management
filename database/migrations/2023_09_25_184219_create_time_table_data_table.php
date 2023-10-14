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
        Schema::create('time_table_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('timetables_id')->constrained('time_tables');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('teacher_id')->constrained('users');
            $table->string('day');
            $table->time('StartFrom');
            $table->time('EndIn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_table_data');
    }
};
