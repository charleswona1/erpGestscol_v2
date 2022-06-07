<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etablissement_id');
            $table->string('nom');
            $table->string('matricule')->nullable();
            $table->char('sexe');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->string('religion')->nullable();
            $table->string('domicile');
            $table->string('type_contact');
            $table->text('autres')->nullable();
            $table->string('nom_pere')->nullable();
            $table->string('nom_mere');
            $table->string('nom_tuteur')->nullable();
            $table->string('profession_pere')->nullable();
            $table->string('profession_mere');
            $table->string('profession_tuteur')->nullable();
            $table->string('tel_pere')->nullable();
            $table->string('tel_mere');
            $table->string('tel_tuteur')->nullable();
            $table->string('aptitude');
            $table->foreign('etablissement_id')->references('id')->on('etablissements');
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
        Schema::dropIfExists('eleves');
    }
}
