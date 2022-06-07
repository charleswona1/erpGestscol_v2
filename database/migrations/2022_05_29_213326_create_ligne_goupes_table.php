<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneGoupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_goupes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('synthese_classe_id');
            $table->unsignedInteger('eleve_classe_id');
            $table->unsignedInteger('etablissement_id');
            $table->unsignedInteger('groupe_matiere_id');
            $table->double("somme_point")->nullable();
            $table->double("somme_coef")->nullable();
            $table->double("moyenne_groupe")->nullable();
            $table->foreign('synthese_classe_id')->references('id')->on('synthese_classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('eleve_classe_id')->references('id')->on('eleve_classes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_goupes');
    }
}
