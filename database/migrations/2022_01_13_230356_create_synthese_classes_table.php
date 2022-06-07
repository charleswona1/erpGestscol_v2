<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyntheseClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synthese_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('classe_annee_id');
            $table->unsignedInteger('annee_academique_id');
            $table->unsignedInteger('periode_id')->nullable();
            $table->unsignedInteger('sous_periode_id')->nullable();
            $table->unsignedInteger('etablissement_id');
            $table->double("moy_classe")->nullable();
            $table->double("moy_max")->nullable();
            $table->double("moy_min")->nullable();
            $table->integer("effectif")->nullable();
            $table->foreign('classe_annee_id')->references('id')->on('classe_annees');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
            $table->foreign('periode_id')->references('id')->on('periodes');
            $table->foreign('sous_periode_id')->references('id')->on('sous_periodes');
            $table->foreign('etablissement_id')->references('id')->on('etablissements');
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
        Schema::dropIfExists('synthese_classes');
    }
}
