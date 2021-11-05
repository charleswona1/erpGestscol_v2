<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EtablissementMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissement_medias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etablissement_id');
            $table->string('url');
            $table->string('name');
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
        Schema::dropIfExists('etablissement_medias');
    }
}
