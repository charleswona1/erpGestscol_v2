<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEvaluationPeriode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_periodes', function (Blueprint $table) {
            $table->unsignedBigInteger("classe_annee_id")->after('id');
            $table->foreign('classe_annee_id')->references('id')->on('classe_matieres');
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
