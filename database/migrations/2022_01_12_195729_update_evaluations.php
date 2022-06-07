<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropForeign('evaluations_academique_id_foreign');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            //
        });
    }
}
