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
        Schema::create('biometric_records', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('folio_uuid');
            $table->string('face_recognition_encoding');
            $table->string('detainee_frontal_pic_path');
            $table->string('detainee_left_side_path');
            $table->string('detainee_right_side_path');
            $table->string('detainee_tatoos_path');
            $table->string('detainee_fingerprint_path');
            $table->string('reason');
            $table->string('facts');
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
        Schema::dropIfExists('biometric_records');
    }
};
