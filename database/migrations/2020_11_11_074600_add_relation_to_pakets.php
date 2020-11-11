<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToPakets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pakets', function (Blueprint $table) {
            $table->dropForeign('pakets_id_user_foreign');
        });

        Schema::table('pakets', function (Blueprint $table) {
            $table->dropIndex('pakets_id_user_foreign');
        });
        
        Schema::table('pakets', function (Blueprint $table) {
            $table->integer('id_user')->change();
        });
    }
}
