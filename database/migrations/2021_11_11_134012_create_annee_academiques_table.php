<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneeAcademiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('annee_academiques')) {

            Schema::create('annee_academiques', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('etablissement_id');
                $table->string('name');
                $table->date('startAt');
                $table->date('EndAt');
                $table->boolean('islock')->default(false);
                $table->boolean('isclose')->default(false);
                $table->boolean('isdefault')->default(false);
                $table->foreign('etablissement_id')->references('id')->on('etablissements');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annee_academiques');
    }
}
