<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSynthesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syntheses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('synthese_classe_id');
            $table->unsignedInteger('eleve_classe_id');
            $table->unsignedInteger('etablissement_id');
            $table->double("som_point")->nullable();
            $table->double("som_coef")->nullable();
            $table->double("moyenne_generale")->nullable();
            $table->integer("rang")->nullable();
            $table->text("appreciation")->nullable();
            $table->text("mention")->nullable();
            $table->foreign('synthese_classe_id')->references('id')->on('syntheses_classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('eleve_classe_id')->references('id')->on('eleve_classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('syntheses');
    }
}
