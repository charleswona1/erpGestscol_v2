<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClasseMatiere extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_matieres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classe_annee_id');
            $table->foreign('classe_annee_id')->references('id')->on('classe_annees');
            $table->unsignedBigInteger('matiere_niveau_id');
            $table->foreign('matiere_niveau_id')->references('id')->on('matiere_niveaux');
            $table->unsignedBigInteger('enseignant_annee_id');
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
        //
    }
}
