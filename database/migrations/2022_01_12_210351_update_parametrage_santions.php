<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateParametrageSantions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parametrage_sanctions', function (Blueprint $table) {
            $table->dropForeign('parametrage_sanctions_cycle_id_foreign');
            $table->dropForeign('parametrage_sanctions_sanction_id_foreign');
            $table->foreign('cycle_id')->references('id')->on('cycles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sanction_id')->references('id')->on('sanctions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parametrage_sanctions', function (Blueprint $table) {
            //
        });
    }
}
