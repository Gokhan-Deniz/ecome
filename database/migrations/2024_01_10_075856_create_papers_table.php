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
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('TC_No');
            $table->string('Soyad');
            $table->string('Ad');
            $table->string('Baba_ad');
            $table->string('Dogum_yeri');
            $table->string('Dogum_tarih');
            $table->string('Ev');
            $table->string('Sicil');
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
        Schema::dropIfExists('papers');
    }
};
