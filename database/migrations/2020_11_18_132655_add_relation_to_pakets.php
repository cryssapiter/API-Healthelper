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
        Schema::table('pakets', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->change();
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_order')->unsigned()->change();
            $table->foreign('id_order')->references('id_order')->on('orders')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_psikolog')->unsigned()->change();
            $table->foreign('id_psikolog')->references('id_psikolog')->on('psikologs')->onUpdate('cascade')->onDelete('cascade');
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
        
        Schema::table('pakets', function (Blueprint $table) {
            $table->dropForeign('pakets_id_order_foreign');
        });

        Schema::table('pakets', function (Blueprint $table) {
            $table->dropIndex('pakets_id_order_foreign');
        });

        Schema::table('pakets', function (Blueprint $table) {
            $table->integer('id_order')->change();
        });

        Schema::table('pakets', function (Blueprint $table) {
            $table->dropForeign('pakets_id_psikolog_foreign');
        });

        Schema::table('pakets', function (Blueprint $table) {
            $table->dropIndex('pakets_id_psikolog_foreign');
        });

        Schema::table('pakets', function (Blueprint $table) {
            $table->integer('id_psikolog')->change();
        });
    }
}