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
            $table->string('folio')->unique();
            $table->date('date')->default(now());
            $table->string('detainee_full_name')->default('detainee_full_name');
            $table->string('receptor_staff_name')->default('receptor_staff_name');
            $table->string('receptor_manager_name')->default('receptor_manager_name');
            $table->JSON('personal_belongings')->default('personal_belongings');
            $table->string('observations')->default('observations');
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
