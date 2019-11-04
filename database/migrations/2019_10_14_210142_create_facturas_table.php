<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa_nit');
            $table->foreign('empresa_nit')
                ->references('nit')->on('empresas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('num_factura');
            $table->string('ruta_factura');
            $table->string('empresa'); //Generador solutech o
            $table->text('descripcion')->nullable();
            $table->string('valor_total');
            $table->boolean('estado');
            $table->dateTime('fecha_facturacion');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
