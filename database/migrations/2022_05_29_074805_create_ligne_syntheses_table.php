<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneSynthesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_syntheses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('synthese_classe_id');
            $table->unsignedInteger('eleve_classe_id');
            $table->unsignedInteger('etablissement_id');
            $table->unsignedInteger('classe_matiere_id');
            $table->unsignedInteger('groupe_matiere_id');
            $table->double("total_point")->nullable();
            $table->double("coef")->nullable();
            $table->double("moyenne")->nullable();
            $table->double("rang")->nullable();
            $table->foreign('synthese_classe_id')->references('id')->on('synthese_classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('eleve_classe_id')->references('id')->on('eleve_classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('classe_matiere_id')->references('id')->on('classe_matieres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('groupe_matiere_id')->references('id')->on('groupe_matieres')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_syntheses');
    }
}
