<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSukelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sukels', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim');
            $table->string('no');
            $table->string('ringkasan');
            $table->string('tujuan');
            $table->string('ket');
            $table->string('fsukel')->nullable();
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
        Schema::dropIfExists('sukels');
    }
}
