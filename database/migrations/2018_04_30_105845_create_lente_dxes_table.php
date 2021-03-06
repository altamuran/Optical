<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLenteDxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lente_dxes', function (Blueprint $table) {
           $table->increments('id');
            $table->Decimal('sfero_dx', 3,2);
            $table->Decimal('cilindro_dx',3,2)->nullable();;
            $table->Integer('asse_dx')->default(0);
            $table->Decimal('addizione_dx',3,2)->nullable();

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
        Schema::dropIfExists('lente_dxes');
    }
}
