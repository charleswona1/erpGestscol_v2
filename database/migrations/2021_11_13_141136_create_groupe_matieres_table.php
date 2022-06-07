<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupeMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('groupe_matieres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('numero');
            $table->unsignedBigInteger('annee_academique_id');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
            $table->unsignedBigInteger('niveau_id');
            $table->foreign('niveau_id')->references('id')->on('niveaux');
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
        Schema::dropIfExists('groupe_matieres');
    }
}
