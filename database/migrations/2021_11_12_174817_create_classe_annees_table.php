<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseAnneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_annees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('effectif');
            $table->integer('ordre')->nullable();
            $table->unsignedBigInteger('niveau_id');
            $table->unsignedBigInteger('annee_academique_id');
            $table->unsignedBigInteger('enseignant_annee_id')->nullable();
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
            $table->foreign('niveau_id')->references('id')->on('niveaux');
            $table->foreign('enseignant_annee_id')->references('id')->on('enseignant_annees');
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
        Schema::dropIfExists('classe_annees');
    }
}
