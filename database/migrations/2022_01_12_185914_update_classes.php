<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign('classes_niveau_id_foreign');
            $table->foreign('niveau_id')->references('id')->on('niveaux')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            //
        });
    }
}
