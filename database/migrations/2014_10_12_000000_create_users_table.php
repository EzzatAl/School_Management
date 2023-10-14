<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('random_number');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable(true);
            $table->string('password');
            $table->string('type');
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->char('t_phone_number')->nullable(true);
            $table->string('s_father')->nullable();
            $table->string('s_mother')->nullable();
            $table->char('s_phone_number')->nullable();
            $table->char('s_home_number')->nullable();
            $table->string('s_address')->nullable();
            $table->string('full_name')->default(DB::raw('CONCAT(first_name, "_", random_number)'));
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
