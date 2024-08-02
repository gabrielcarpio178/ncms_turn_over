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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('id_course');
            $table->foreign('id_course')->references('id')->on('programs')->onDelete('cascade');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('sname')->nullable();
            $table->string('street_number');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->unsignedInteger('zipcode');
            $table->string('nationality');
            $table->unsignedBigInteger('contact_number');
            $table->string('email');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('education');
            $table->string('employment');
            $table->boolean('status')->default(0);
            $table->date('birthdate');
            $table->string('birthplace');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');

    }
};
