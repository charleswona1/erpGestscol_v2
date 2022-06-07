<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGroupeMatieres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groupe_matieres', function (Blueprint $table) {
            $table->dropForeign('groupe_matieres_annee_academique_id_foreign');
            $table->dropForeign('groupe_matieres_niveau_id_foreign');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('niveau_id')->references('id')->on('niveaux')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groupe_matieres', function (Blueprint $table) {
            //
        });
    }
}
