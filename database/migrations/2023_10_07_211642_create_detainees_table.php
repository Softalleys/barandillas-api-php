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
            $table->integer('folio');
            $table->string('ref_authority_name');
            $table->string('admission_date');
            $table->string('detention_time');
            $table->date('releasing_date');
            $table->time('releasing_time');
            $table->string('arrest_cause');
            $table->string('has_witness');
            $table->string('week_number');
            $table->string('detainee_firstname');
            $table->string('detainee_lastname1');
            $table->string('detainee_lastname2');
            $table->string('detainee_nickname');
            $table->string('detainee_occupation');
            $table->string('detainee_sex');
            $table->Integer('detainee_age');
            $table->string('detainee_martial_state');
            $table->string('detainee_scholarchip');
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
//PENDIENTE------------------------------------------------
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
