<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // if(Schema::hasTable('sanctions')) return;       //add this line to your database file
        
        Schema::create('sanctions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('abbreviation');
            $table->integer('unite');
            $table->integer('seuil');
            $table->integer('degre');
            $table->unsignedBigInteger('etablissement_id');
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
        Schema::dropIfExists('sanctions');
    }
}
