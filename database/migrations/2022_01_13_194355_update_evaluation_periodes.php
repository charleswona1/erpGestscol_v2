<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEvaluationPeriodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_periodes', function (Blueprint $table) {
            $table->dropForeign('evaluation_periodes_periode_id_foreign');
            $table->dropForeign('evaluation_periodes_sous_periode_id_foreign');
            $table->dropForeign('evaluation_periodes_evaluation_id_foreign');
            $table->dropForeign('evaluation_periodes_annee_academique_id_foreign');
            $table->dropForeign('evaluation_periodes_classe_annee_id_foreign');
            
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('periode_id')->references('id')->on('periodes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sous_periode_id')->references('id')->on('sous_periodes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('classe_annee_id')->references('id')->on('classe_matieres')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluation_periodes', function (Blueprint $table) {
            //
        });
    }
}
