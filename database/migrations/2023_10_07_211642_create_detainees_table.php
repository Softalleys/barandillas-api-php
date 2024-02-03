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
        Schema::create('detainees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('folio_uuid');
            $table->string('admission_date');
            $table->string('detention_time');
            $table->date('releasing_date');
            $table->time('releasing_time');
            $table->string('arrest_cause');
            $table->string('detainee_firstname');
            $table->string('detainee_lastname1');
            $table->string('detainee_lastname2');
            $table->string('detainee_nickname');
            $table->string('detainee_gang');
            $table->string('detainee_occupation');
            $table->string('detainee_sex');
            $table->Integer('detainee_age');
            $table->date('detainee_birthdate');
            $table->string('detainee_marital_state');
            $table->string('detainee_scholarship');
            $table->string('detainee_country');
            $table->string('detainee_nationality');
            $table->string('detainee_address');
            $table->string('detainee_address_number');
            $table->string('detainee_address_internal_number');
            $table->string('detainee_street1');
            $table->string('detainee_street2');
            $table->string('detainee_neighborhood');
            $table->string('detainee_zipcode');
            $table->string('detainee_city');
            $table->string('detainee_state');
            $table->string('detainee_tel');
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
        Schema::dropIfExists('detainees');
    }
};
