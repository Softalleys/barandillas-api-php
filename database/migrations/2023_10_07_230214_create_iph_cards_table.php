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
        Schema::create('iph_cards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('folio_uuid');
            $table->datetime('detention_datetime');
            $table->string('detainee_detention_street');
            $table->string('detainee_detention_street2');
            $table->string('detainee_detention_neighborhood');
            $table->string('detainee_detention_city');
            $table->string('has_witness');
            $table->Integer('police_number');
            $table->Integer('police_plate');
            $table->string('police_zone');
            $table->string('police_company');
            $table->string('police_unit_number');
            $table->string('police_name');
            $table->string('police_job');
            $table->string('police_group');
            $table->string('ref_authority');
            $table->string('iph_fault');
            $table->string('iph_felony');
            $table->string('detainee_height');
            $table->string('detainee_hair_color');
            $table->string('detainee_hair_length');
            $table->string('detainee_beard');
            $table->string('detainee_accent');
            $table->string('detainee_skin_color');
            $table->string('detainee_eyes_color');
            $table->string('detainee_hair_type');
            $table->string('detainee_signs');
            $table->string('detainee_particular_signs');
            $table->Integer('capturist_info_number');
            $table->string('capturist_info_fullname');
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
        Schema::dropIfExists('iph_cards');
    }
};
