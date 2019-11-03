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
            $table->string('empresa_nit', 30);
            $table->unsignedBigInteger('factura_id');
            $table->foreign('empresa_nit')
                ->references('nit')->on('empresas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('factura_id')
                ->references('id')->on('facturas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('ruta_recibo');
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
