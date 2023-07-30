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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('prsc_number')->from(1000);
            $table->date('prsc_date')->nullable();
            $table->foreignId('doctor_code');
            $table->foreignId('patient_code');
            $table->foreignId('poly_code');
            $table->foreignId('user_code');
            $table->text('consult_result')->nullable();
            $table->bigInteger('total_payment')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
};
