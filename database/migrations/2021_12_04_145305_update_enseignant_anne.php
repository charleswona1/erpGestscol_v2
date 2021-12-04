<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnseignantAnne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enseignant_annees', function (Blueprint $table) {
            $table->unsignedInteger('enseignant_id')->after('id');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enseignant_annees', function (Blueprint $table) {
            //
        });
    }
}
