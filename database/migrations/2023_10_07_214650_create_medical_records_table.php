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
            $table->id();
            $table->uuid('uuid');
            $table->uuid('folio_uuid');
            $table->string('detainee_first_name');
            $table->string('detainee_lastname1');
            $table->string('detainee_lastname2');
            $table->tinyInteger('detainee_age');
            $table->time('time');
            $table->date('date');
            $table->string('dictum');
            $table->string('medical_exam');
            $table->string('injuries_description');
            $table->string('medical_observations');
            $table->boolean('marijuana_intoxication');
            $table->string('detainee_gang');
            $table->string('physical_exploration');
            $table->double('alcohosensor', 2, 2);
            $table->string('diagnosis_description');
            $table->smallInteger('drugs_quantity');
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
