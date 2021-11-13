<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleveClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleve_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etablissement_id');
            $table->unsignedBigInteger('annee_academique_id');
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
            $table->integer('numero');
            $table->string('avatar_url')->nullable();
            $table->boolean('ancien')->default(false);
            $table->boolean('interne')->default(false);
            $table->string('precedent_etablissement', 255)->nullable();
            $table->string('precedent_niveau', 50)->nullable();
            $table->boolean('is_redouble')->default(false);
            $table->string('decision', 100)->nullable();
            $table->string('next_classe', 50)->nullable();
            $table->foreign('etablissement_id')->references('id')->on('etablissements');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academiques');
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
        Schema::dropIfExists('eleve_classes');
    }
}
