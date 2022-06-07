<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatiereNiveaux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matiere_niveaux', function (Blueprint $table) {
            $table->dropForeign('matiere_niveaux_matiere_id_foreign');
            $table->dropForeign('matiere_niveaux_niveau_id_foreign');
            $table->dropForeign('matiere_niveaux_groupe_matiere_id_foreign');

            $table->foreign('matiere_id')->references('id')->on('matieres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('niveau_id')->references('id')->on('niveaux')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('groupe_matiere_id')->references('id')->on('groupe_matieres')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matiere_niveaux', function (Blueprint $table) {
            //
        });
    }
}
