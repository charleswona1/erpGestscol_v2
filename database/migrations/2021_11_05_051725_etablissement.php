<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Etablissement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abreviation');
            $table->string('type_etablissement');
            $table->string('type_apprenant');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('email');
            $table->string('telephone');
            $table->string('fax');
            $table->string('site_web')->nullable();
            $table->text('localisation');
            $table->string('nom_periode');
            $table->string('adj_masculin_periode');
            $table->string('adj_feminin_periode');
            $table->string('nom_sous_periode');
            $table->string('adj_masculin_sous_periode');
            $table->string('adj_feminin_sous_periode');
            $table->string('nom_annee')->nullable();
            $table->string('adj_masculin_annee')->nullable();
            $table->string('adj_feminin_annee')->nullable();
            $table->string('resp1')->nullable();
            $table->string('resp2')->nullable();
            $table->string('resp3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etablissements');
    }
}
