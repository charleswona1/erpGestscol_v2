<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddPropEvaluationPeriode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_periodes', function (Blueprint $table) {
            $table->double("pourcentage_periode")->after('numero')->nullable();
            $table->double("pourcentage_sous_periode")->after('pourcentage_periode')->nullable();
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
