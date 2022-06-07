<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEtablissementUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etablissement_users', function (Blueprint $table) {
            $table->dropForeign('etablissement_users_etablissement_id_foreign');
            $table->dropForeign('etablissement_users_user_id_foreign');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etablissement_users', function (Blueprint $table) {
            //
        });
    }
}
