<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etablissement_id');
            $table->string('name', 255);
            $table->string('titre', 100);
            $table->string('matricule', 20)->nullable();
            $table->string('avatar_url')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance', 100)->nullable();
            $table->char('sexe');
            $table->string('num_autorisation', 50)->nullable();
            $table->string('num_cnps', 50)->nullable();
            $table->string('num_cni', 20)->nullable();
            $table->string('religion', 255)->nullable();
            $table->string('status', 100);
            $table->string('diplome', 255);
            $table->string('telephone', 15);
            $table->string('email', 100)->nullable();
            $table->string('localisation', 255);
            $table->string('groupe_sanguin', 10)->nullable();
            $table->text('autres')->nullable();
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
        Schema::dropIfExists('enseignants');
    }
}
