<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClasseMatieres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classe_matieres', function (Blueprint $table) {
            $table->dropForeign('classe_matieres_classe_annee_id_foreign');
            $table->dropForeign('classe_matieres_matiere_niveau_id_foreign');
            $table->dropForeign('classe_matieres_enseignant_annee_id_foreign');
            $table->dropForeign('classe_matieres_etablissement_id_foreign');
            
            $table->foreign('classe_annee_id')->references('id')->on('classe_annees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('matiere_niveau_id')->references('id')->on('matiere_niveaux')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('enseignant_annee_id')->references('id')->on('enseignant_annees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classe_matieres', function (Blueprint $table) {
            //
        });
    }
}
