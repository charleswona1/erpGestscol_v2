<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EtablissementUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissement_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etablissement_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_default')->default(true);
            $table->integer('is_default_annee');
            $table->foreign('etablissement_id')->references('id')->on('etablissements');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('etablissement_users');
    }
}
