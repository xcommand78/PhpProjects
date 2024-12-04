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
        Schema::create('profeesor__subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professor_id');
            $table->foreignId('subject_id');
            $table->string('class_room');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profeesor__subjects');
    }
};
