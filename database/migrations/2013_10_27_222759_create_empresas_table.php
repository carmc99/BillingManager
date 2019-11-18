<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->string('nit', 30)->primary();
            $table->string('nombre', 200);
            $table->string('direccion', 255)->default('')->nullable();
            $table->string('telefono', 50)->default('')->nullable();
            $table->string('correo', 200)->default('')->nullable();
            $table->string('ruta_logo')->default('')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
