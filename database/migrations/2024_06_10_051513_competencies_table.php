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
        Schema::create("competencies", function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("programs_id");
            $table->foreign("programs_id")->references('id')->on('programs')->onDelete('cascade');
            $table->string('competencie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencies');
    }
};
