<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdinisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordinis', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('n_ordine')->primary();
            $table->timestamps();
            $table->integer('id_cliente');
            $table->integer('id_lente_dx');
            $table->integer('id_lente_sx');

            $table->foreign('id_cliente')
            ->references('codice_cliente')->on('clientis');

            $table->foreign('id_lente_sx')
            ->references('id')->on('lente_sxes')
            ->onDelete('cascade');

            $table->foreign('id_lente_dx')
            ->references('id')->on('lente_dxes')
            ->onDelete('cascade');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordinis');
    }
}
