<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnseigantAnnees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enseignant_annees', function (Blueprint $table) {
            $table->dropForeign('enseignant_annees_academique_id_foreign');
            $table->dropForeign('enseignant_annees_etablissement_id_foreign');
            $table->dropForeign('enseignant_annees_enseignant_id_foreign');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enseignant_annees', function (Blueprint $table) {
            //
        });
    }
}
