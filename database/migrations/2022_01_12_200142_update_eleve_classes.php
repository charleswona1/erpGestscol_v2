<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEleveClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleve_classes', function (Blueprint $table) {
            $table->dropForeign('eleve_classes_etablissement_id_foreign');
            $table->dropForeign('eleve_classes_academique_id_foreign');
            $table->dropForeign('eleve_classes_classe_annee_id_foreign');
            $table->dropForeign('eleve_classes_niveau_id_foreign');
            $table->dropForeign('eleve_classes_eleve_id_foreign');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('classe_annee_id')->references('id')->on('classe_annees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('niveau_id')->references('id')->on('niveaux')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('eleve_id')->references('id')->on('eleves')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eleve_classes', function (Blueprint $table) {
            //
        });
    }
}
