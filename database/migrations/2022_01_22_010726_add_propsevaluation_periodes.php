<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropsevaluationPeriodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_periodes', function (Blueprint $table) {
            $table->unsignedInteger('classe_matiere_id')->after('id');
            $table->foreign('classe_matiere_id')->references('id')->on('classe_matieres')->onUpdate('cascade')->onDelete('cascade');
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
