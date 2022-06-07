<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEleveClasse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleve_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('niveau_id');
            $table->unsignedBigInteger('classe_annee_id')->nullable();
            $table->foreign('classe_annee_id')->references('id')->on('classe_annees');
            $table->foreign('niveau_id')->references('id')->on('niveaux');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eleve_classes', function (Blueprint $table) {
            //
        });
    }
}
