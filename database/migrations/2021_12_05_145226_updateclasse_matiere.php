<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateclasseMatiere extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classe_matieres', function (Blueprint $table) {
            $table->unsignedBigInteger("etablissement_id")->after('id');
            $table->foreign('etablissement_id')->references('id')->on('etablissements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classe_matieres', function (Blueprint $table) {
            //
        });
    }
}
