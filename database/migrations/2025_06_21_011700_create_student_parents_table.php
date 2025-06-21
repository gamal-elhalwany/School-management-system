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
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            // Father Information.
            $table->string('father_name');
            $table->string('father_national_ID')->unique();
            $table->string('father_passport_ID')->unique();
            $table->string('father_phone')->unique();
            $table->string('father_job');
            $table->string('father_address');
            $table->unsignedBigInteger('father_nationality_id');
            $table->unsignedBigInteger('father_blood_type_id');
            $table->unsignedBigInteger('father_religion_id');

            // Mother Information.
            $table->string('mother_name');
            $table->string('mother_national_ID')->unique();
            $table->string('mother_passport_ID')->unique();
            $table->string('mother_phone')->unique();
            $table->string('mother_job');
            $table->string('mother_address');
            $table->unsignedBigInteger('mother_nationality_id');
            $table->unsignedBigInteger('mother_blood_type_id');
            $table->unsignedBigInteger('mother_religions_id');

            // Father Forign Keys.
            $table->foreign('father_nationality_id')->references('id')->on('nationalities');
            $table->foreign('father_blood_type_id')->references('id')->on('blood_types');
            $table->foreign('father_religions_id')->references('id')->on('religions');

            // Mother Forign Keys.
            $table->foreign('mother_nationality_id')->references('id')->on('nationalities');
            $table->foreign('mother_blood_type_id')->references('id')->on('blood_types');
            $table->foreign('mother_religions_id')->references('id')->on('religions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};
