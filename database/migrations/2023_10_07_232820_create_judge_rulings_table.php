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
            $table->uuid('id')->primary();
            $table->uuid('folio_uuid');
            $table->string('fault_cited');
            $table->string('fault_commited');
            $table->string('art_broken_number');
            $table->string('sanction');
            $table->string('time_in_arrest');
            $table->string('free_by');
            $table->string('release_observation');
            $table->string('judge_receptor_number');
            $table->string('judge_receptor_fullname');
            $table->string('judge_releasing_number');
            $table->string('judge_releasing_fullname');
            $table->dateTime('releasing_datetime');
            $table->boolean('has_freedom_auth');
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
