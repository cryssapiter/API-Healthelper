<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->change();
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('id_paket')->unsigned()->change();
            $table->foreign('id_paket')->references('id_paket')->on('pakets')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_id_user_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('orders_id_user_foreign');
        });
        
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('id_user')->change();
        });
        
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_id_paket_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('orders_id_paket_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('id_paket')->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_id_psikolog_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('orders_id_psikolog_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('id_psikolog')->change();
        });
    }
}
