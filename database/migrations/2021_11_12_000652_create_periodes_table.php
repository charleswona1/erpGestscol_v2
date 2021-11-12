<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('periodes', function (Blueprint $table) {
                $table->id();
                $table->integer('numero');
                $table->date('startAt');
                $table->date('endAt');
                $table->integer('pourcentage');
                
                $table->unsignedBigInteger('annee_academique_id');
                $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
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
        Schema::dropIfExists('periodes');
    }
}
