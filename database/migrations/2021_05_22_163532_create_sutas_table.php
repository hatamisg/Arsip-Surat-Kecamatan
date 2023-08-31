<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sutas', function (Blueprint $table) {
            $table->id();
            $table->string('pertama');
            $table->string('kedua');
            $table->string('status');
            $table->string('harga');
            $table->string('luas');
            $table->string('batas');
            $table->string('kel');
            $table->string('fsuta')->nullable();
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
        Schema::dropIfExists('sutas');
    }
}
