<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNiveau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveaux', function (Blueprint $table) {
            $table->unsignedBigInteger('etablissement_id');
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
        Schema::table('niveaux', function (Blueprint $table) {
            //
        });
    }
}
