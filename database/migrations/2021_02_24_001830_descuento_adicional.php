<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DescuentoAdicional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentoAdicional', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemlookupcode',25)->unique();
            $table->string('description', 30)->nullable();
            $table->string('tipoDesc', 5);
            $table->float('descuento', 2, 2);
            $table->date('fechaInicia');
            $table->date('fechaFinaliza');
            $table->string('requisitos', 200)->nullable();
            $table->timestamp('DBTimeStamp')->nullable();
            //$table->timestamps();  //Habilita las columnas Updated_at y Created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descuentoAdicional');
    }
}
