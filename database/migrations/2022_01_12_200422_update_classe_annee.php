<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClasseAnnee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classe_annees', function (Blueprint $table) {
            $table->dropForeign('classe_annees_academique_id_foreign');
            $table->dropForeign('classe_annees_niveau_id_foreign');
            $table->dropForeign('classe_annees_enseignant_annee_id_foreign');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('niveau_id')->references('id')->on('niveaux')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('enseignant_annee_id')->references('id')->on('enseignant_annees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classe_annees', function (Blueprint $table) {
            //
        });
    }
}
