<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecibosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('num_recibo')->nullable();

            $table->string('empresa_nit', 30)->nullable(false);;
            $table->foreign('empresa_nit')
                ->references('nit')->on('empresas')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->string('factura_id', 200)->nullable(false);;
            $table->foreign('factura_id')
                ->references('num_factura')->on('facturas')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->string('empresa_generadora_nit', 30); //Generador solutech o
            $table->foreign('empresa_generadora_nit')
                ->references('nit')->on('empresas_generadoras')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->unsignedInteger('valor_abono');
            $table->string('ruta_recibo');
            $table->dateTime('fecha_recibo');
            $table->string('descripcion');
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
        Schema::dropIfExists('recibos');
    }
}
