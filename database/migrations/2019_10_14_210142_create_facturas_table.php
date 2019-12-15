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
            $table->string('num_factura',200)->unique()->nullable(false);;
            $table->string('ruta_factura');
            $table->string('empresa_generadora_nit' ,30); //Generador solutech o
            $table->foreign('empresa_generadora_nit')
                ->references('nit')->on('empresas_generadoras')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('valor_total');
            $table->bigInteger('valor_adeudado')->default(0);
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')->references('codigo')
                ->on('estados_factura')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            //$table->boolean('estado');
            $table->dateTime('fecha_facturacion');
            $table->string('periodo_facturacion', 255);
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
