<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('folio_uuid');
            $table->string('detainee_firstname');
            $table->string('detainee_lastname1');
            $table->string('detainee_lastname2');
            $table->tinyInteger('detainee_age');
            $table->time('time');
            $table->date('date');
            $table->string('dictum');
            $table->string('medical_exam');
            $table->string('injuries_description');
            $table->string('medical_observations');
            $table->string('has_marijuana_intoxication');
            $table->string('detainee_gang');
            $table->string('physical_exploration');
            $table->double('alcohosensor', 4, 2);
            $table->json('diagnosis_description');
            $table->json('drugs_type');
            $table->Integer('doctor_number');
            $table->Integer('doctor_plate');
            $table->string('doctor_fullname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};
