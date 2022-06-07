<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAnneeAcademeiques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('annee_academiques', function (Blueprint $table) {
            $table->dropForeign('annee_academiques_etablissement_id_foreign');
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
        Schema::table('annee_academiques', function (Blueprint $table) {
            //
        });
    }
}
