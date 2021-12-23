<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_periodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('matiere_niveau_id');
            $table->unsignedInteger('annee_academique_id');
            $table->unsignedInteger('periode_id');
            $table->unsignedInteger('sous_periode_id');
            $table->unsignedInteger('evaluation_id');
            $table->date('date_evaluation');
            $table->double('bareme');
            $table->bigInteger('numero');
            $table->text('commentataire');
            
            $table->foreign('matiere_niveau_id')->references('id')->on('matiere_niveaux');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
            $table->foreign('periode_id')->references('id')->on('periodes');
            $table->foreign('sous_periode_id')->references('id')->on('sous_periodes');
            $table->foreign('evaluation_id')->references('id')->on('evaluations');

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
        Schema::dropIfExists('evaluation_periodes');
    }
}
