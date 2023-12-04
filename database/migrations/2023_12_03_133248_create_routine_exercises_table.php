<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('routine_exercises', function (Blueprint $table) {
            $table->id();
            $table->string('routine_id');
            $table->string('exercise_id');
            $table->string('order_num');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('routine_exercises');
    }



};
