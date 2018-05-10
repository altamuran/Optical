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
            $table->Decimal('sfero_sx', 3, 2);
            $table->Decimal('cilindro_sx', 3, 2)->nullable();;
            $table->Integer('asse_sx')->default(0);
            $table->Decimal('addizione_sx',3,2)->nullable();;

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
