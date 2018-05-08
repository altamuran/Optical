<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLenteSxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lente_sxes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedDecimal('sfero', 3, 2);
            $table->unsignedDecimal('cilindro', 3, 2)->nullable();;
            $table->unsignedinteger('asse');
            $table->unsignedDecimal('addizione',3,2)->nullable();;

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
        Schema::dropIfExists('lente_sxes');
    }
}
