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
        Schema::create('judge_rulings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('folio_uuid');
            $table->dateTime('detention_datetime');
            $table->string('detainee_gang');
            $table->string('detainee_firstname');
            $table->string('detainee_lastname1');
            $table->string('detainee_lastname2');
            $table->string('fault');
            $table->string('observations');
            $table->string('fault_cited');
            $table->string('fault_commited');
            $table->string('art_broken_number');
            $table->string('sanction');
            $table->time('time_in_arrest');
            $table->boolean('free_by');
            $table->string('release_observation');
            $table->string('judge_receptor_number');
            $table->string('judge_receptor_fullname');
            $table->string('judge_releasing_number');
            $table->string('judge_releasing_fullname');
            $table->dateTime('releasing_datetime');
            $table->boolean('has_freedom_auth');
            $table->Integer('commissioner_receptor_number');
            $table->string('commissioner_receptor_fullname');
            $table->Integer('commissioner_release_number');
            $table->string('commissioner_release_fullname');
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
        Schema::dropIfExists('judge_rulings');
    }
};
