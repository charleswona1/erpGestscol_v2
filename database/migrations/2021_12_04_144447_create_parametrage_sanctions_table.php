<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrageSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // if(Schema::hasTable('parametrage_sanctions')) return;       //add this line to your database file
        
        Schema::create('parametrage_sanctions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->integer('valeur');
            $table->integer('valeur2');
            $table->integer('sanction_id2');
            $table->unsignedBigInteger('cycle_id');
            $table->foreign('cycle_id')->references('id')->on('cycles');
            $table->unsignedBigInteger('sanction_id');
            $table->foreign('sanction_id')->references('id')->on('sanctions');
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
        Schema::dropIfExists('parametrage_sanctions');
    }
}
