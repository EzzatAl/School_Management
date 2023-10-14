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
        Schema::create('area_busses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained('areas');
            $table->time('TimeMorningArrived');
            $table->time('TimeAfterNoonArrived');
            $table->string('Type');
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_busses');
    }
};
