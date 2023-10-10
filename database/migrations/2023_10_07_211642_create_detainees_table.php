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
            $table->id();
            $table->integer('folio');
            $table->string('ref_authority_name');
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
