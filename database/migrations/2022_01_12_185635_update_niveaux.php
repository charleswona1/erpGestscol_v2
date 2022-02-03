<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNiveaux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveaux', function (Blueprint $table) {
            $table->dropForeign('niveaux_cycle_id_foreign');
            $table->foreign('cycle_id')->references('id')->on('cycles')->onUpdate('cascade')->onDelete('cascade');
            $table->dropForeign('niveaux_etablissement_id_foreign');
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
        Schema::table('niveaux', function (Blueprint $table) {
            //
        });
    }
}
