<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_periodes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->date('startAt');
            $table->date('endAt');
            $table->unsignedBigInteger('periode_id');
            $table->foreign('periode_id')->references('id')->on('periodes');
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
        Schema::dropIfExists('sous_periodes');
    }
}
