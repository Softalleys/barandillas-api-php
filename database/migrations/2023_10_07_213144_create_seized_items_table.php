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
        Schema::create('seized_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('folio', 191)->unique();
            $table->date('date')->default(now());
            $table->string('detainee_full_name');
            $table->string('receptor_staff_name');
            $table->string('receptor_manager_name');
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
        Schema::dropIfExists('seized_items');
    }
};
