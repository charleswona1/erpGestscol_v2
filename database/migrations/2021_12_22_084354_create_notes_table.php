<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('evaluation_periode_id');
            $table->unsignedInteger('eleve_classe_id');
            $table->double('note');
            $table->foreign('evaluation_periode_id')->references('id')->on('evaluation_periodes');
            $table->foreign('eleve_classe_id')->references('id')->on('eleve_classes');
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
        Schema::dropIfExists('notes');
    }
}
