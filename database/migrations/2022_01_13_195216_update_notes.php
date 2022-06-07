<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign('notes_annee_evaluation_periode_id_foreign');
            $table->dropForeign('notes_classe_eleve_classe_id_foreign');

            $table->foreign('evaluation_periode_id')->references('id')->on('evaluation_periodes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('eleve_classe_id')->references('id')->on('eleve_classes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            //
        });
    }
}
