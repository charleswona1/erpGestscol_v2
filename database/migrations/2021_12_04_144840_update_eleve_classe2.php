<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEleveClasse2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleve_classes', function (Blueprint $table) {
            $table->unsignedInteger('eleve_id')->after('id');
            $table->foreign('eleve_id')->references('id')->on('eleves');
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
