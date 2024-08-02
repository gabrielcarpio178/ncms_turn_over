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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('students_id');
            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('plname');
            $table->string('pfname');
            $table->string('pmname');
            $table->string('psname');
            $table->string('pstreet_number');
            $table->string('pdistrict');
            $table->string('pzipcode');
            $table->string('pmunicipality');
            $table->unsignedBigInteger('pcontact_number');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
