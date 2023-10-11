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
        Schema::create('folios', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('folio');
            $table->date('date');
            $table->string('detainee_full_name');
            $table->string('receptor_staff_name');
            $table->string('receptor_manager_name');
            $table->string('release_staff_name');
            $table->string('release_manager_name');
            $table->string('personal_belongings');
            $table->string('observations');
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
        Schema::dropIfExists('folios');
    }
};
